<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class FileHelper
{
    /**
     * Simpan file ke storage/app/public/<folder> dan salin ke root/uploads/<folder>.
     * Mendukung struktur folder bertingkat (misal: product/hp).
     */
    public static function uploadToRootUploads($file, $folder, $customName = null)
    {
        // Pastikan folder tidak mengandung karakter aneh
        $folder = trim($folder, '/');

        // Ambil ekstensi file
        $extension = $file->getClientOriginalExtension();

        // Gunakan nama custom (kalau ada), atau nama asli file
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        // Bersihkan nama file dari spasi & karakter aneh
        $safeName = preg_replace('/[^A-Za-z0-9_\-]/', '_', $customName ?? $originalName);

        // Buat nama file baru unik
        $fileName = time() . '_' . $safeName . '.' . $extension;

        // Path penyimpanan
        $storagePath = "public/{$folder}/{$fileName}"; // untuk Storage Laravel
        $publicPath = "uploads/{$folder}/{$fileName}"; // untuk root publik (Hostinger)
        $fullPublicPath = base_path($publicPath); // full path absolut

        // Simpan ke storage Laravel
        $file->storeAs($folder, $fileName, 'public');

        // Pastikan folder di root/uploads/<folder> ada
        if (!file_exists(dirname($fullPublicPath))) {
            mkdir(dirname($fullPublicPath), 0777, true);
        }

        // Salin ke root/uploads
        copy(storage_path('app/public/' . $folder . '/' . $fileName), $fullPublicPath);

        // Return path relatif yang disimpan di database
        return $publicPath;
    }

    /**
     * Hapus file dari storage & root/uploads (jika ada).
     */
    public static function deleteFromBoth($path)
    {
        if (!$path) return;

        // Pastikan path diawali "uploads/"
        $relativePath = str_replace('uploads/', '', $path);

        // Hapus dari storage/app/public
        Storage::disk('public')->delete($relativePath);

        // Hapus dari root/uploads
        $uploadsPath = base_path($path);
        if (file_exists($uploadsPath)) {
            unlink($uploadsPath);
        }
    }
}
