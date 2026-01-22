<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;

class MailTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:test {--to= : Recipient email address} {--mailers= : Comma separated mailers to test (default: mailgun,smtp,failover,log)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send test emails through configured mailers to verify Mailgun / SMTP / failover behavior';

    public function handle()
    {
        $to = $this->option('to') ?: config('portal.contact.email_support') ?: config('mail.from.address');
        $mailers = $this->option('mailers') ?: 'mailgun,smtp,failover,log';
        $mailers = array_map('trim', explode(',', $mailers));

        $this->info("Sending test emails to {$to}");

        foreach ($mailers as $mailer) {
            $this->line("\nTesting mailer: {$mailer}");

            try {
                $data = [
                    'name' => 'Artisan Mail Test',
                    'email' => $to,
                    'company' => 'Local Test',
                    'message' => "Test send via mailer: {$mailer} at " . now(),
                ];

                // Use specified mailer if available
                if ($mailer === 'default') {
                    Mail::to($to)->send(new ContactMessage($data));
                } else {
                    Mail::mailer($mailer)->to($to)->send(new ContactMessage($data));
                }

                $this->info("[OK] {$mailer} — sent (or queued) successfully.");
            } catch (\Exception $e) {
                $this->error("[FAIL] {$mailer} — " . $e->getMessage());
            }
        }

        $this->info('\nMailer test complete. Check Mail logs or MailHog / Mailgun console as appropriate.');

        return 0;
    }
}
