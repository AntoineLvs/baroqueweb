<?php

namespace App\Services;

class SvgIconService
{
    /**
     * Load an SVG from the assets directory.
     *
     * @param string $iconName The name of the SVG file (without the extension).
     * @return string
     */
    public function getSvgIcon(string $iconName): string
    {
        $filePath = public_path("assets/svg/{$iconName}.svg");

        if (file_exists($filePath)) {
            return file_get_contents($filePath);
        }

        return '';
    }
}
