<?php

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
        Schema::table('offers', function (Blueprint $table) {
            $table->string('title');
            $table->foreignId('payment_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('company');
            $table->date('last_day');
            $table->text('description');
            $table->string('image');
            $table->integer('published')->default(1);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->dropForeign('offers_category_id_foreign');
            $table->dropForeign('offers_payment_id_foreign');
            $table->dropForeign('offers_user_id_foreign');
            $table->dropColumn([
                'title',
                'payment_id',
                'category_id',
                'company',
                'last_day',
                'description',
                'image',
                'published',
                'user_id'
            ]);
        });
    }
};
