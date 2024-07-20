<?php

use App\Models\Photo;
use App\Models\Post;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_photo', function (Blueprint $table) {
            $table->foreignIdFor(Post::class)->constrained();
            $table->foreignIdFor(Photo::class)->constrained();
 
            $table->primary(['post_id','photo_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_photo');
    }
};
