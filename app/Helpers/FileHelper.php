<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class FileHelper
{
    /**
     * Simpan file ke storage dan salin ke public/uploads.
     */
    public static function uploadToRootUploads($file, $folder)
    {
        // Simpan ke storage/app/public/<folder>
        $path = $file->store($folder, 'public');

        // Path sumber & tujuan
        $source = storage_path('app/public/' . $path);
        $destination = base_path('uploads/' . $path);

        // Buat folder jika belum ada
        if (!file_exists(dirname($destination))) {
            mkdir(dirname($destination), 0777, true);
        }

        // Salin ke root/uploads/<folder>
        copy($source, $destination);

        return $path;
    }

    /**
     * Hapus file dari storage & public/uploads.
     */
    public static function deleteFromBoth($path)
    {
        if (!$path) return;

        // Hapus dari storage
        Storage::disk('public')->delete($path);

        // Hapus dari public/uploads
        $uploadsPath = public_path('uploads/' . $path);
        if (file_exists($uploadsPath)) {
            unlink($uploadsPath);
        }
    }
}
