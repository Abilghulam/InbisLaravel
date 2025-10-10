<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class FileHelper
{
    /**
     * Simpan file ke storage dan salin ke root/uploads.
     */
    public static function uploadToRootUploads($file, $folder)
    {
        // Simpan ke storage/app/public/<folder>
        $path = $file->store($folder, 'public'); // contoh: brands/nama.jpg

        // Path sumber (storage) & tujuan (root/uploads)
        $source = storage_path('app/public/' . $path);
        $destination = base_path('uploads/' . $path);

        // Buat folder jika belum ada
        if (!file_exists(dirname($destination))) {
            mkdir(dirname($destination), 0777, true);
        }

        // Salin ke root/uploads/<folder>
        copy($source, $destination);

        // Kembalikan path yang akan disimpan di database
        return 'uploads/' . $path; // contoh: uploads/brands/nama.jpg
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
