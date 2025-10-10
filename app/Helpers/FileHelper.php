<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class FileHelper
{
    /**
     * Simpan file ke storage dan salin ke root/uploads.
     */
    public static function uploadToRootUploads($file, $folder, $customName = null)
  {
    // Ambil ekstensi file
    $extension = $file->getClientOriginalExtension();

    // Gunakan nama custom (kalau ada), atau nama asli file
    $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

    // Bersihkan nama file dari spasi & karakter aneh
    $safeName = preg_replace('/[^A-Za-z0-9_\-]/', '_', $customName ?? $originalName);

    // Buat nama file baru
    $fileName = time() . '_' . $safeName . '.' . $extension;

    // Path final
    $relativePath = "uploads/{$folder}/{$fileName}";
    $storagePath = storage_path('app/public/' . $folder . '/' . $fileName);
    $uploadPath = base_path($relativePath);

    // Simpan file ke storage/app/public/<folder>
    $file->storeAs($folder, $fileName, 'public');

    // Pastikan folder di root/uploads/<folder> ada
    if (!file_exists(dirname($uploadPath))) {
        mkdir(dirname($uploadPath), 0777, true);
    }

    // Copy ke root/uploads
    copy(storage_path('app/public/' . $folder . '/' . $fileName), $uploadPath);

    // Return path yang disimpan di DB
    return $relativePath;
  }

    /**
     * Hapus file dari storage & root/uploads (jika ada).
     */
    public static function deleteFromBoth($path)
    {
        if (!$path) return;

        // Hilangkan "uploads/" dari depan path jika ada (biar bisa akses ke storage)
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
