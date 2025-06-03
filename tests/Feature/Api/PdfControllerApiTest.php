<?php
namespace Tests\Feature\Api;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use App\Services\PdfServices\PdfService;
use App\Models\User;
use App\Models\Student;
use App\Models\Professor;
use App\Models\OtherWorker;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Foreach_;


class PdfControllerApiTest extends TestCase
{
    use RefreshDatabase;


    protected function setUp(): void
    {
           parent::setUp();
    }

    /** @test */
    public function  it_can_export_all_pdfs()
    {
        $this->app->bind(PdfService::class, function()
        {
            return new class  extends PdfService {
                public function generatePdf($data, string $view, string $key = 'data'): string{
                    return '%PDF CONTENT%';
                }
            };
        });

           $types = [
            'student' => Student::factory()->create(),
            'professor' => Professor::factory()->create(),
            'otherWorker' => OtherWorker::factory()->create(),

        ];


           foreach($types as $type => $model) {
            $response = $this->get("/api/v1/pdf/{$type}/{$model->id}");
            $response->assertStatus(200)
                ->assertHeader('Content-Type', 'application/pdf');
               $disposition = $response->headers->get('Content-Disposition');

              $this->assertStringContainsString('inline', $disposition);
              $this->assertStringContainsString($model->name, $disposition);
              $response->assertSee('%PDF CONTENT%', false);
           }
    }


}
