<?php

namespace App\Console\Commands;

use App\Models\Media;
use App\Models\Media\MediaExtra;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class Videoconverter extends Command
{
    protected $signature = 'videohlsconverter';
    protected $description = 'Command convert video to hls';
    public function handle()
    {

        $res240  = (new \FFMpeg\Format\Video\X264('aac'))->setKiloBitrate(350)->setVideoCodec('libx264');
        $res360  = (new \FFMpeg\Format\Video\X264('aac'))->setKiloBitrate(700)->setVideoCodec('libx264');
        $res480  = (new \FFMpeg\Format\Video\X264('aac'))->setKiloBitrate(1200)->setVideoCodec('libx264');
        $res720 = (new \FFMpeg\Format\Video\X264('aac'))->setKiloBitrate(2500)->setVideoCodec('libx264');
        $res1080 = (new \FFMpeg\Format\Video\X264('aac'))->setKiloBitrate(5000)->setVideoCodec('libx264');

        $datax = Media::where('type', 'video')->get();
        for ($i = 0; $i < $datax->count(); $i++) {
            $data = Media::where('type', 'video')->find($datax[$i]->id);
            if ($data) {
                $jsx = $data->data;
                $jsx['video_status'] = 2;
                $data->data = $jsx;
                $data->save();
                $file = $data->id;
                $id = $data->id;
                $filename = str_replace("private", "", $data->data['loc']);
                FFMpeg::fromDisk('private')
                    ->open($filename)
                    ->exportForHLS()
                    ->withRotatingEncryptionKey(function ($filename, $contents) use ($id) {
                        Storage::disk('secret')->put('videos/' . $id . '/' . $filename, $contents);
                    })
                    // ->addFormat($res240)
                    // ->addFormat($res360)
                    // ->addFormat($res480)
                    ->addFormat($res720)
                    ->addFormat($res1080)
                    ->toDisk('public')
                    ->save('videos/' . $data->id . '/file.m3u8');
                $jsx['stream'] = 'storage/videos/' . $data->id . '/file.m3u8';
                $jsx['video_status'] = 3;
                $data->data = $jsx;
                $data->save();
            }
        }

        // $datax = MediaExtra::where('type', 'video_tour')->where('data->video_status',0)->get();
        // for ($i = 0; $i < $datax->count(); $i++) {
        //     $data = MediaExtra::find($datax[$i]->id);
        //     if ($data) {
        //         $jsx = $data->data;
        //         $jsx['video_status'] = 2;
        //         $data->data = $jsx;
        //         $data->save();
        //         $file = $data->id;
        //         $id = $data->id;
        //         $filename = str_replace("private", "", $data->data['loc']);
        //         FFMpeg::fromDisk('private')
        //             ->open($filename)
        //             ->exportForHLS()
        //             ->withRotatingEncryptionKey(function ($filename, $contents) use ($id) {
        //                 Storage::disk('secret')->put('videos/' . $id . '/' . $filename, $contents);
        //             })
        //             ->addFormat($res240)
        //             ->addFormat($res360)
        //             // ->addFormat($res480)
        //             // ->addFormat($res720)
        //             // ->addFormat($res1080)
        //             // ->addFormat($highformat)
        //             ->toDisk('public')
        //             ->save('videos/' . $data->id . '/file.m3u8');
        //         $jsx['stream'] = 'storage/videos/' . $data->id . '/file.m3u8';
        //         $jsx['video_status'] = 3;
        //         $data->data = $jsx;
        //         $data->save();
        //     }
        // }
















        return 0;
    }
}
