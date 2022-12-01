<?php

namespace App\Http\Resources\Api\V1\File;

use Illuminate\Http\Resources\Json\JsonResource;
use Sn1KeRs385\FileUploader\App\Models\File;

/**
 * @mixin File
 */
class IndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $array = [
            'id' => $this->id,
            'status' => $this->status,
            'collection' => $this->collection,
            'filename' => $this->original_filename,
            'type' => $this->type,
            'url' => $this->url,
            'files' => null,
        ];

        if (count($this->files) > 0) {
            $array['files'] = self::collection($this->files);
        }

        return $array;
    }
}
