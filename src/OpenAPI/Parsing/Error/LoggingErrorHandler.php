<?php
/*
 * This file is part of Swagger Mock.
 *
 * (c) Igor Lazarev <strider2038@yandex.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\OpenAPI\Parsing\Error;

use App\OpenAPI\Parsing\SpecificationPointer;
use Psr\Log\LoggerInterface;

/**
 * @author Igor Lazarev <strider2038@yandex.ru>
 */
class LoggingErrorHandler implements ParsingErrorHandlerInterface
{
    /** @var LoggerInterface */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function reportError(string $message, SpecificationPointer $pointer): void
    {
        $this->logger->error($this->formatMessage($message, $pointer));
    }

    public function reportWarning(string $message, SpecificationPointer $pointer): void
    {
        $this->logger->warning($this->formatMessage($message, $pointer));
    }

    private function formatMessage(string $message, SpecificationPointer $pointer): string
    {
        return sprintf('Parsing error "%s" at path "%s".', $message, $pointer->getPath());
    }
}
