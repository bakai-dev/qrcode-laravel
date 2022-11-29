<?php

namespace Tests\Feature;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\Qrcode\Model\Qrcode;
use Tests\TestCase;

/**
 * Class QrcodeTest
 * @package Tests\Feature
 */
final class QrcodeTest extends TestCase
{
    /** @var User */
    protected $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    /** @test */
    public function create_qrcode()
    {
        $this->actingAs($this->user)
            ->postJson(route('qrcodes.store'), [
                'content' => 'Lorem',
            ])
            ->assertSuccessful();

        $this->assertDatabaseHas('qrcodes', [
            'content' => 'Lorem',
        ]);
    }

    /** @test */
    public function update_qrcode()
    {
        $qrcode = Qrcode::factory()->create();

        $this->actingAs($this->user)
            ->putJson(route('qrcodes.update', $qrcode->id), [
                'content' => 'Updated qrcode',
            ])
            ->assertSuccessful()
            ->assertJson(['type' => Controller::RESPONSE_TYPE_SUCCESS]);

        $this->assertDatabaseHas('qrcodes', [
            'id' => $qrcode->id,
            'content' => 'Updated qrcode',
        ]);
    }

    /** @test */
    public function show_qrcode()
    {
        $qrcode = Qrcode::factory()->create();

        $this->actingAs($this->user)
            ->getJson(route('qrcodes.show', $qrcode->id))
            ->assertSuccessful();
    }

    /** @test */
    public function list_qrcode()
    {
        $qrcodes = Qrcode::factory()->count(2)->create()->map(function ($qrcode) {
            return $qrcode->only(['id', 'content']);
        });

        $this->actingAs($this->user)
            ->getJson(route('qrcodes.index'))
            ->assertSuccessful()
            ->assertJson([
                'data' => $qrcodes->toArray(),
            ])
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'content'],
                ],
                'links',
                'meta',
            ]);
    }

    /** @test */
    public function delete_qrcode()
    {
        $qrcode = Qrcode::factory()->create([
            'content' => 'Qrcode for delete',
        ]);

        $this->actingAs($this->user)
            ->deleteJson(route('qrcodes.update', $qrcode->id))
            ->assertSuccessful()
            ->assertJson(['type' => Controller::RESPONSE_TYPE_SUCCESS]);

        $this->assertDatabaseMissing('qrcodes', [
            'id' => $qrcode->id,
            'content' => 'Qrcode for delete',
        ]);
    }
}
