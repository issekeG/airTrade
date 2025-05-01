<?php

// src/Service/VideoTrimmer.php
namespace App\Service;

use FFMpeg\FFMpeg;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\Format\Video\X264;

class VideoTrimmer
{
    public function trimVideo(string $inputPath, string $outputPath, int $duration): void
    {
        // Initialiser FFmpeg
        $ffmpeg = FFMpeg::create();

        // Ouvrir la vidéo
        $video = $ffmpeg->open($inputPath);

        // Tronquer la vidéo
        $video
            ->filters()
            ->clip(TimeCode::fromSeconds(0), TimeCode::fromSeconds($duration));


        $format = new X264();

        // Enregistrer la vidéo tronquée
        $video->save($format, $outputPath);
    }
}