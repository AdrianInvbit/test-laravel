<?php

namespace App\Support;

use Illuminate\Foundation\Application;

class DeploymentMetadata
{
    public const UNAVAILABLE = 'No disponible';

    /**
     * @return array{
     *     name: string,
     *     version: string,
     *     framework: string,
     *     framework_version: string,
     *     git_branch: string,
     *     git_commit: string,
     *     deployed_at: string
     * }
     */
    public static function all(): array
    {
        return [
            'name' => self::value(config('deploy.app_name'), 'test-laravel'),
            'version' => self::value(config('deploy.app_version'), 'v0.1.0'),
            'framework' => 'Laravel',
            'framework_version' => Application::VERSION,
            'git_branch' => self::value(config('deploy.git_branch')),
            'git_commit' => self::value(config('deploy.git_commit')),
            'deployed_at' => self::value(config('deploy.deployed_at')),
        ];
    }

    public static function value(mixed $value, ?string $fallback = null): string
    {
        $normalized = is_string($value) ? trim($value) : '';

        if ($normalized !== '') {
            return $normalized;
        }

        if ($fallback !== null && $fallback !== '') {
            return $fallback;
        }

        return self::UNAVAILABLE;
    }
}
