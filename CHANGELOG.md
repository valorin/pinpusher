# Change Log
All notable changes to this project will be documented in this file.
This project adheres to [Semantic Versioning](http://semver.org/).

## [Unreleased][unreleased]

*No changes*

## [1.3.0] - 2015-10-30
### Added
- Added primary and secondary colors for layouts.
- Added `Color::random()` to retrieve a random supported color.

### Changed
- Tweaked the `Color::foreground()` formula to improve colour detection.

## [1.2.1] - 2015-10-03
## Fixed
- Adam Cooper removed redundant line that causes code breakage: <https://github.com/valorin/pinpusher/pull/1>

## [1.2.0] - 2015-09-15
## Added
- Added `PebbleApiException::getResponse()` to retrieve the original raw API response when a pin push attempt fails.
- Added `Color::foreground($color)` to easily generate a suitable foreground colour based on the selected background.

## Updated
- Limiting `locationName` field to 256 characters.

## [1.1.0] - 2015-09-10
### Added
- Added support for [HTTP Actions](https://developer.getpebble.com/guides/timeline/pin-structure/#http-actions).

### Removed
- Removed redundant `TypeRequiredException` exception.

## [1.0.1] - 2015-08-30
### Added
- Added `Color::isValid()` helper for validating HEX colour codes are valid Pebble colours.

## [1.0.0] - 2015-08-30
### Initial release
- Initial proper release of PinPusher.
- Fully support all options of the Timeline API.

[unreleased]: https://github.com/valorin/pinpusher/compare/v1.3.0...HEAD
[1.3.0]: https://github.com/valorin/pinpusher/compare/v1.2.1...v1.3.0
[1.2.1]: https://github.com/valorin/pinpusher/compare/v1.2.0...v1.2.1
[1.2.0]: https://github.com/valorin/pinpusher/compare/v1.1.0...v1.2.0
[1.1.0]: https://github.com/valorin/pinpusher/compare/v1.0.1...v1.1.0
[1.0.1]: https://github.com/valorin/pinpusher/compare/v1.0.0...v1.0.1
[1.0.0]: https://github.com/valorin/pinpusher/compare/6a9c7db...v1.0.0
