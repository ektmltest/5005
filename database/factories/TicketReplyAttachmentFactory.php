<?php

namespace Database\Factories;

use App\Models\TicketReply;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TicketReplyAttachment>
 */
class TicketReplyAttachmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'file' => fake()->imageUrl(),
            'ticket_reply_id' => TicketReply::inRandomOrder()->first()->id,
        ];
    }
}
