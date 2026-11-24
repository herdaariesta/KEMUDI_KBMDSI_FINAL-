<?php

namespace Tests\Feature;

use App\Models\ProgramKerja;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProgramKerjaTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Test index page displays program kerja list.
     */
    public function test_proker_index_displays_proker_list(): void
    {
        $response = $this->get('/proker');

        $response->assertStatus(200);
        $response->assertSee('Manajemen Program Kerja');
        $response->assertSee('DSI Informatics Expo 2026');
        $response->assertSee('LKMM-TD DSI 2026');
        $response->assertSee('Fahri Dewantoro');
    }

    /**
     * Test filter proker by division.
     */
    public function test_proker_can_be_filtered_by_divisi(): void
    {
        $response = $this->get('/proker?divisi=PSDM');

        $response->assertStatus(200);
        $response->assertSee('LKMM-TD DSI 2026');
        $response->assertDontSee('DSI Informatics Expo 2026');
    }

    /**
     * Test store new proker into database.
     */
    public function test_can_create_new_proker(): void
    {
        $data = [
            'kode' => 'TI-99',
            'nama' => 'Tech Workshop AI 2026',
            'divisi' => 'PIT',
            'pic' => 'Ahmad Fauzi',
            'pagu_anggaran' => 5000000,
            'jadwal' => '10 Oktober 2026',
            'tempat' => 'Lab Komputer FILKOM UB',
            'progres_persen' => 15,
            'progres_deskripsi' => 'Pengajuan Proposal',
            'status_lpj' => 'Tahap Proposal',
        ];

        $response = $this->post('/proker', $data);

        $response->assertRedirect('/proker');
        $this->assertDatabaseHas('program_kerjas', [
            'kode' => 'TI-99',
            'nama' => 'Tech Workshop AI 2026',
        ]);
    }

    /**
     * Test update proker.
     */
    public function test_can_update_proker(): void
    {
        $proker = ProgramKerja::where('kode', 'KL-01')->firstOrFail();

        $response = $this->put("/proker/{$proker->id}", [
            'kode' => 'KL-01',
            'nama' => 'DSI Informatics Expo 2026 Updated',
            'divisi' => 'PIT',
            'pic' => 'Fahri Dewantoro Updated',
            'pagu_anggaran' => 20000000,
            'jadwal' => '18 - 20 Mei 2026',
            'tempat' => 'Gedung G FILKOM UB',
            'progres_persen' => 100,
            'progres_deskripsi' => 'Selesai Paripurna',
            'status_lpj' => '✓ Disahkan DPA (Paripurna)',
        ]);

        $response->assertRedirect('/proker');
        $this->assertDatabaseHas('program_kerjas', [
            'id' => $proker->id,
            'nama' => 'DSI Informatics Expo 2026 Updated',
            'pagu_anggaran' => 20000000,
        ]);
    }

    /**
     * Test delete proker.
     */
    public function test_can_delete_proker(): void
    {
        $proker = ProgramKerja::where('kode', 'KL-01')->firstOrFail();

        $response = $this->delete("/proker/{$proker->id}");

        $response->assertRedirect('/proker');
        $this->assertDatabaseMissing('program_kerjas', [
            'id' => $proker->id,
        ]);
    }
}
