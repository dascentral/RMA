# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

RMA (`dascentral/rma`) is a PHP utility library providing formatting and helper functions for dates, names, phone numbers, and math. It depends on `nesbot/carbon` ^2.0 and requires PHP >= 7.0.

## Commands

```bash
# Install dependencies
composer install

# Run all tests
./vendor/bin/phpunit

# Run a specific test suite (Dorothy, Graham, Juliet, Willard)
./vendor/bin/phpunit --testsuite=Willard

# Run a specific test file
./vendor/bin/phpunit tests/Willard/AgeTest.php

# Run a specific test method
./vendor/bin/phpunit --filter=testMethodName
```

## Architecture

All source classes live in `src/` under the `Dascentral\Rma` namespace. Each class is a standalone utility with static methods:

- **Dorothy** - Math rounding utilities (round to nearest multiple)
- **Graham** - US phone number formatting
- **Juliet** - Name formatting (ucwords/strtolower)
- **Willard** - Extends `Carbon\Carbon` with date/time helpers (age calculation, human-readable dates, week/sunday utilities, time slot generation)

Tests mirror the source structure under `tests/` with the `Tests` namespace. Each source class has a corresponding test directory (e.g., `tests/Willard/`) which may contain multiple test files for different method groups.
