<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public string $fromEmail  = '';
    public string $fromName   = '';
    public string $recipients = '';

    /**
     * The "user agent"
     */
    public string $userAgent = 'CodeIgniter';

    /**
     * The mail sending protocol: mail, sendmail, smtp
     */
    public string $protocol = 'smtp'; // Updated to 'smtp' assuming you use SMTP.

    /**
     * The server path to Sendmail.
     */
    public string $mailPath = '/usr/sbin/sendmail';

    /**
     * SMTP Server Hostname
     */
    public string $SMTPHost = '';

    /**
     * SMTP Username
     */
    public string $SMTPUser = '';

    /**
     * SMTP Password
     */
    public string $SMTPPass = '';

    /**
     * SMTP Port
     */
    public int $SMTPPort = 587; // 587 is commonly used for TLS

    /**
     * SMTP Timeout (in seconds)
     */
    public int $SMTPTimeout = 5;

    /**
     * Enable persistent SMTP connections
     */
    public bool $SMTPKeepAlive = false;

    /**
     * SMTP Encryption.
     */
    public string $SMTPCrypto = 'tls'; // Use 'tls' or 'ssl'

    /**
     * Enable word-wrap
     */
    public bool $wordWrap = true;

    /**
     * Character count to wrap at
     */
    public int $wrapChars = 76;

    /**
     * Type of mail, either 'text' or 'html'
     */
    public string $mailType = 'html'; // Updated to 'html' to support HTML emails.

    /**
     * Character set (utf-8, iso-8859-1, etc.)
     */
    public string $charset = 'UTF-8';

    /**
     * Whether to validate the email address
     */
    public bool $validate = true;

    /**
     * Email Priority. 1 = highest. 5 = lowest. 3 = normal
     */
    public int $priority = 3;

    /**
     * Newline character. (Use “\r\n” to comply with RFC 822)
     */
    public string $CRLF = "\r\n";

    /**
     * Newline character. (Use “\r\n” to comply with RFC 822)
     */
    public string $newline = "\r\n";

    /**
     * Enable BCC Batch Mode.
     */
    public bool $BCCBatchMode = false;

    /**
     * Number of emails in each BCC batch
     */
    public int $BCCBatchSize = 200;

    /**
     * Enable notify message from server
     */
    public bool $DSN = false;

    /**
     * Constructor to load the values from .env file.
     */
    public function __construct()
    {
        $this->fromEmail = getenv('email.fromEmail') ?: 'your-email@example.com';
        $this->fromName = getenv('email.fromName') ?: 'Your Name';
        $this->recipients = getenv('email.recipients') ?: 'recipients@example.com';
        $this->SMTPHost = getenv('email.SMTPHost') ?: 'smtp.yourprovider.com';
        $this->SMTPUser = getenv('email.SMTPUser') ?: 'your-email@example.com';
        $this->SMTPPass = getenv('email.SMTPPass') ?: 'your-email-password';
        $this->SMTPPort = getenv('email.SMTPPort') ?: 587;
        $this->SMTPCrypto = getenv('email.SMTPCrypto') ?: 'tls';
        $this->mailType = getenv('email.mailType') ?: 'html';
        $this->charset = getenv('email.charset') ?: 'UTF-8';
        $this->wordWrap = getenv('email.wordWrap') === 'true';
    }
}
