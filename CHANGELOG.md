# Change Log
All notable changes to this project will be documented in this file.
This project adheres to [Semantic Versioning](http://semver.org/).

## [Unreleased][unreleased]
## Added
- Added `PebbleApiException::getResponse()` to retrieve the original raw API response when a pin push attempt fails.

## Updated
- Limiting locationName field to 256 characters.

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

[unreleased]: https://github.com/valorin/pinpusher/compare/v1.0.1...HEAD
[1.0.1]: https://github.com/valorin/pinpusher/compare/v1.0.0...v1.0.1
[1.0.0]: https://github.com/valorin/pinpusher/compare/6a9c7db...v1.0.0
