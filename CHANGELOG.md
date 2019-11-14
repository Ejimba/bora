# Changelog

## 0.0.6 (2019-11-11)

### Added
- Add `appointments` module


## 0.0.5 (2019-11-11)

### Changed
- Moved `patients` validation to Form Requests

## 0.0.4 (2019-11-11)

### Added
- Add `redis` client

### Changed
- Add foreign key on `patients` table

### Fixed
- Update `patients.create` route order to fix inability to add new patient
- Fixed `patients` datatable failing to reference `users` table on linux

## 0.0.3 (2019-11-11)

### Added
- Add `patients` module

### Changed
- Change login attribute from `email` to `username`
- Add soft deleting to `user` model

## 0.0.2 (2019-11-10)

### Added
- Add base layout and child layouts

## 0.0.1 - (2019-11-08)

### Added
- Laravel Framework, initial release