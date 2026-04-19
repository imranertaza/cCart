<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $description; ?>">
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <meta name="author" content="Your Name or Company">

    <meta name="csrf-token" content="<?= csrf_hash() ?>">
    <meta name="csrf-header" content="<?= csrf_header() ?>">
    <meta name="csrf-name" content="<?= csrf_token() ?>">

    <!-- Bootstrap CSS -->
    <title><?php echo $title; ?></title>
    <link rel="shortcut icon"
          href="<?php echo base_url() ?>/uploads/logo/<?php echo get_lebel_by_value_in_theme_settings('favicon'); ?>"
          type="image/x-icon">
    <!-- fonts start  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <style>
        :root {
            --bs-blue: #0d6efd;
            --bs-indigo: #6610f2;
            --bs-purple: #6f42c1;
            --bs-pink: #d63384;
            --bs-red: #dc3545;
            --bs-orange: #fd7e14;
            --bs-yellow: #ffc107;
            --bs-green: #198754;
            --bs-teal: #20c997;
            --bs-cyan: #0dcaf0;
            --bs-black: #000;
            --bs-white: #fff;
            --bs-gray: #6c757d;
            --bs-gray-dark: #343a40;
            --bs-gray-100: #f8f9fa;
            --bs-gray-200: #e9ecef;
            --bs-gray-300: #dee2e6;
            --bs-gray-400: #ced4da;
            --bs-gray-500: #adb5bd;
            --bs-gray-600: #6c757d;
            --bs-gray-700: #495057;
            --bs-gray-800: #343a40;
            --bs-gray-900: #212529;
            --bs-primary: #0d6efd;
            --bs-secondary: #6c757d;
            --bs-success: #198754;
            --bs-info: #0dcaf0;
            --bs-warning: #ffc107;
            --bs-danger: #dc3545;
            --bs-light: #f8f9fa;
            --bs-dark: #212529;
            --bs-primary-rgb: 13, 110, 253;
            --bs-secondary-rgb: 108, 117, 125;
            --bs-success-rgb: 25, 135, 84;
            --bs-info-rgb: 13, 202, 240;
            --bs-warning-rgb: 255, 193, 7;
            --bs-danger-rgb: 220, 53, 69;
            --bs-light-rgb: 248, 249, 250;
            --bs-dark-rgb: 33, 37, 41;
            --bs-primary-text-emphasis: #052c65;
            --bs-secondary-text-emphasis: #2b2f32;
            --bs-success-text-emphasis: #0a3622;
            --bs-info-text-emphasis: #055160;
            --bs-warning-text-emphasis: #664d03;
            --bs-danger-text-emphasis: #58151c;
            --bs-light-text-emphasis: #495057;
            --bs-dark-text-emphasis: #495057;
            --bs-primary-bg-subtle: #cfe2ff;
            --bs-secondary-bg-subtle: #e2e3e5;
            --bs-success-bg-subtle: #d1e7dd;
            --bs-info-bg-subtle: #cff4fc;
            --bs-warning-bg-subtle: #fff3cd;
            --bs-danger-bg-subtle: #f8d7da;
            --bs-light-bg-subtle: #fcfcfd;
            --bs-dark-bg-subtle: #ced4da;
            --bs-primary-border-subtle: #9ec5fe;
            --bs-secondary-border-subtle: #c4c8cb;
            --bs-success-border-subtle: #a3cfbb;
            --bs-info-border-subtle: #9eeaf9;
            --bs-warning-border-subtle: #ffe69c;
            --bs-danger-border-subtle: #f1aeb5;
            --bs-light-border-subtle: #e9ecef;
            --bs-dark-border-subtle: #adb5bd;
            --bs-white-rgb: 255, 255, 255;
            --bs-black-rgb: 0, 0, 0;
            --bs-font-sans-serif: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", "Liberation Sans", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            --bs-font-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            --bs-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
            --bs-body-font-family: var(--bs-font-sans-serif);
            --bs-body-font-size: 1rem;
            --bs-body-font-weight: 400;
            --bs-body-line-height: 1.5;
            --bs-body-color: #212529;
            --bs-body-color-rgb: 33, 37, 41;
            --bs-body-bg: #fff;
            --bs-body-bg-rgb: 255, 255, 255;
            --bs-emphasis-color: #000;
            --bs-emphasis-color-rgb: 0, 0, 0;
            --bs-secondary-color: rgba(33, 37, 41, 0.75);
            --bs-secondary-color-rgb: 33, 37, 41;
            --bs-secondary-bg: #e9ecef;
            --bs-secondary-bg-rgb: 233, 236, 239;
            --bs-tertiary-color: rgba(33, 37, 41, 0.5);
            --bs-tertiary-color-rgb: 33, 37, 41;
            --bs-tertiary-bg: #f8f9fa;
            --bs-tertiary-bg-rgb: 248, 249, 250;
            --bs-heading-color: inherit;
            --bs-link-color: #0d6efd;
            --bs-link-color-rgb: 13, 110, 253;
            --bs-link-decoration: underline;
            --bs-link-hover-color: #0a58ca;
            --bs-link-hover-color-rgb: 10, 88, 202;
            --bs-code-color: #d63384;
            --bs-highlight-color: #212529;
            --bs-highlight-bg: #fff3cd;
            --bs-border-width: 1px;
            --bs-border-style: solid;
            --bs-border-color: #dee2e6;
            --bs-border-color-translucent: rgba(0, 0, 0, 0.175);
            --bs-border-radius: 0.375rem;
            --bs-border-radius-sm: 0.25rem;
            --bs-border-radius-lg: 0.5rem;
            --bs-border-radius-xl: 1rem;
            --bs-border-radius-xxl: 2rem;
            --bs-border-radius-2xl: var(--bs-border-radius-xxl);
            --bs-border-radius-pill: 50rem;
            --bs-box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            --bs-box-shadow-sm: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            --bs-box-shadow-lg: 0 1rem 3rem rgba(0, 0, 0, 0.175);
            --bs-box-shadow-inset: inset 0 1px 2px rgba(0, 0, 0, 0.075);
            --bs-focus-ring-width: 0.25rem;
            --bs-focus-ring-opacity: 0.25;
            --bs-focus-ring-color: rgba(13, 110, 253, 0.25);
            --bs-form-valid-color: #198754;
            --bs-form-valid-border-color: #198754;
            --bs-form-invalid-color: #dc3545;
            --bs-form-invalid-border-color: #dc3545
        }

        *,
        ::after,
        ::before {
            box-sizing: border-box
        }

        @media (prefers-reduced-motion: no-preference) {
            :root {
                scroll-behavior: smooth
            }
        }

        body {
            font-family: var(--bs-body-font-family);
            font-size: var(--bs-body-font-size);
            font-weight: var(--bs-body-font-weight);
            line-height: var(--bs-body-line-height);
            color: var(--bs-body-color);
            text-align: var(--bs-body-text-align);
            background-color: var(--bs-body-bg);
            -webkit-text-size-adjust: 100%
        }

        h1,
        h4 {
            margin-top: 0;
            margin-bottom: .5rem;
            font-weight: 500;
            line-height: 1.2;
            color: var(--bs-heading-color)
        }

        h1 {
            font-size: calc(1.375rem + 1.5vw)
        }

        @media (min-width: 1200px) {
            h1 {
                font-size: 2.5rem
            }
        }

        h4 {
            font-size: calc(1.275rem + .3vw)
        }

        @media (min-width: 1200px) {
            h4 {
                font-size: 1.5rem
            }
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem
        }

        ul {
            padding-left: 2rem
        }

        ul {
            margin-top: 0;
            margin-bottom: 1rem
        }

        ul ul {
            margin-bottom: 0
        }

        a {
            color: rgba(var(--bs-link-color-rgb), var(--bs-link-opacity, 1));
            text-decoration: underline
        }

        img,
        svg {
            vertical-align: middle
        }

        button {
            border-radius: 0
        }

        button,
        input {
            margin: 0;
            font-family: inherit;
            font-size: inherit;
            line-height: inherit
        }

        button {
            text-transform: none
        }

        [type=button],
        button {
            -webkit-appearance: button
        }

        ::-moz-focus-inner {
            padding: 0;
            border-style: none
        }

        ::-webkit-datetime-edit-day-field,
        ::-webkit-datetime-edit-fields-wrapper,
        ::-webkit-datetime-edit-hour-field,
        ::-webkit-datetime-edit-minute,
        ::-webkit-datetime-edit-month-field,
        ::-webkit-datetime-edit-text,
        ::-webkit-datetime-edit-year-field {
            padding: 0
        }

        ::-webkit-inner-spin-button {
            height: auto
        }

        [type=search] {
            -webkit-appearance: textfield;
            outline-offset: -2px
        }

        ::-webkit-search-decoration {
            -webkit-appearance: none
        }

        ::-webkit-color-swatch-wrapper {
            padding: 0
        }

        ::-webkit-file-upload-button {
            font: inherit;
            -webkit-appearance: button
        }

        ::file-selector-button {
            font: inherit;
            -webkit-appearance: button
        }

        .container,
        .container-fluid {
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 0;
            width: 100%;
            padding-right: calc(var(--bs-gutter-x) * .5);
            padding-left: calc(var(--bs-gutter-x) * .5);
            margin-right: auto;
            margin-left: auto
        }

        @media (min-width: 576px) {
            .container {
                max-width: 540px
            }
        }

        @media (min-width: 768px) {
            .container {
                max-width: 720px
            }
        }

        @media (min-width: 992px) {
            .container {
                max-width: 960px
            }
        }

        @media (min-width: 1200px) {
            .container {
                max-width: 1140px
            }
        }

        :root {
            --bs-breakpoint-xs: 0;
            --bs-breakpoint-sm: 576px;
            --bs-breakpoint-md: 768px;
            --bs-breakpoint-lg: 992px;
            --bs-breakpoint-xl: 1200px;
            --bs-breakpoint-xxl: 1400px
        }

        .row {
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 0;
            display: flex;
            flex-wrap: wrap;
            margin-top: calc(-1 * var(--bs-gutter-y));
            margin-right: calc(-.5 * var(--bs-gutter-x));
            margin-left: calc(-.5 * var(--bs-gutter-x))
        }

        .row > * {
            flex-shrink: 0;
            width: 100%;
            max-width: 100%;
            padding-right: calc(var(--bs-gutter-x) * .5);
            padding-left: calc(var(--bs-gutter-x) * .5);
            margin-top: var(--bs-gutter-y)
        }

        .g-4 {
            --bs-gutter-x: 1.5rem
        }

        .g-4 {
            --bs-gutter-y: 1.5rem
        }

        @media (min-width: 768px) {
            .col-md-6 {
                flex: 0 0 auto;
                width: 50%
            }
        }

        .collapse:not(.show) {
            display: none
        }

        .dropdown {
            position: relative
        }

        .dropdown-toggle {
            white-space: nowrap
        }

        .dropdown-toggle::after {
            display: inline-block;
            margin-left: .255em;
            vertical-align: .255em;
            content: "";
            border-top: .3em solid;
            border-right: .3em solid transparent;
            border-bottom: 0;
            border-left: .3em solid transparent
        }

        .dropdown-menu {
            --bs-dropdown-zindex: 1000;
            --bs-dropdown-min-width: 10rem;
            --bs-dropdown-padding-x: 0;
            --bs-dropdown-padding-y: 0.5rem;
            --bs-dropdown-spacer: 0.125rem;
            --bs-dropdown-font-size: 1rem;
            --bs-dropdown-color: var(--bs-body-color);
            --bs-dropdown-bg: var(--bs-body-bg);
            --bs-dropdown-border-color: var(--bs-border-color-translucent);
            --bs-dropdown-border-radius: var(--bs-border-radius);
            --bs-dropdown-border-width: var(--bs-border-width);
            --bs-dropdown-inner-border-radius: calc(var(--bs-border-radius) - var(--bs-border-width));
            --bs-dropdown-divider-bg: var(--bs-border-color-translucent);
            --bs-dropdown-divider-margin-y: 0.5rem;
            --bs-dropdown-box-shadow: var(--bs-box-shadow);
            --bs-dropdown-link-color: var(--bs-body-color);
            --bs-dropdown-link-hover-color: var(--bs-body-color);
            --bs-dropdown-link-hover-bg: var(--bs-tertiary-bg);
            --bs-dropdown-link-active-color: #fff;
            --bs-dropdown-link-active-bg: #0d6efd;
            --bs-dropdown-link-disabled-color: var(--bs-tertiary-color);
            --bs-dropdown-item-padding-x: 1rem;
            --bs-dropdown-item-padding-y: 0.25rem;
            --bs-dropdown-header-color: #6c757d;
            --bs-dropdown-header-padding-x: 1rem;
            --bs-dropdown-header-padding-y: 0.5rem;
            position: absolute;
            z-index: var(--bs-dropdown-zindex);
            display: none;
            min-width: var(--bs-dropdown-min-width);
            padding: var(--bs-dropdown-padding-y) var(--bs-dropdown-padding-x);
            margin: 0;
            font-size: var(--bs-dropdown-font-size);
            color: var(--bs-dropdown-color);
            text-align: left;
            list-style: none;
            background-color: var(--bs-dropdown-bg);
            background-clip: padding-box;
            border: var(--bs-dropdown-border-width) solid var(--bs-dropdown-border-color);
            border-radius: var(--bs-dropdown-border-radius)
        }

        .dropdown-item {
            display: block;
            width: 100%;
            padding: var(--bs-dropdown-item-padding-y) var(--bs-dropdown-item-padding-x);
            clear: both;
            font-weight: 400;
            color: var(--bs-dropdown-link-color);
            text-align: inherit;
            text-decoration: none;
            white-space: nowrap;
            background-color: transparent;
            border: 0;
            border-radius: var(--bs-dropdown-item-border-radius, 0)
        }

        .nav-link {
            display: block;
            padding: var(--bs-nav-link-padding-y) var(--bs-nav-link-padding-x);
            font-size: var(--bs-nav-link-font-size);
            font-weight: var(--bs-nav-link-font-weight);
            color: var(--bs-nav-link-color);
            text-decoration: none;
            background: 0 0;
            border: 0
        }

        .navbar {
            --bs-navbar-padding-x: 0;
            --bs-navbar-padding-y: 0.5rem;
            --bs-navbar-color: rgba(var(--bs-emphasis-color-rgb), 0.65);
            --bs-navbar-hover-color: rgba(var(--bs-emphasis-color-rgb), 0.8);
            --bs-navbar-disabled-color: rgba(var(--bs-emphasis-color-rgb), 0.3);
            --bs-navbar-active-color: rgba(var(--bs-emphasis-color-rgb), 1);
            --bs-navbar-brand-padding-y: 0.3125rem;
            --bs-navbar-brand-margin-end: 1rem;
            --bs-navbar-brand-font-size: 1.25rem;
            --bs-navbar-brand-color: rgba(var(--bs-emphasis-color-rgb), 1);
            --bs-navbar-brand-hover-color: rgba(var(--bs-emphasis-color-rgb), 1);
            --bs-navbar-nav-link-padding-x: 0.5rem;
            --bs-navbar-toggler-padding-y: 0.25rem;
            --bs-navbar-toggler-padding-x: 0.75rem;
            --bs-navbar-toggler-font-size: 1.25rem;
            --bs-navbar-toggler-icon-bg: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%2833, 37, 41, 0.75%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
            --bs-navbar-toggler-border-color: rgba(var(--bs-emphasis-color-rgb), 0.15);
            --bs-navbar-toggler-border-radius: var(--bs-border-radius);
            --bs-navbar-toggler-focus-width: 0.25rem;
            position: relative;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            padding: var(--bs-navbar-padding-y) var(--bs-navbar-padding-x)
        }

        .navbar > .container-fluid {
            display: flex;
            flex-wrap: inherit;
            align-items: center;
            justify-content: space-between
        }

        .navbar-brand {
            padding-top: var(--bs-navbar-brand-padding-y);
            padding-bottom: var(--bs-navbar-brand-padding-y);
            margin-right: var(--bs-navbar-brand-margin-end);
            font-size: var(--bs-navbar-brand-font-size);
            color: var(--bs-navbar-brand-color);
            text-decoration: none;
            white-space: nowrap
        }

        .navbar-nav {
            --bs-nav-link-padding-x: 0;
            --bs-nav-link-padding-y: 0.5rem;
            --bs-nav-link-font-weight: ;
            --bs-nav-link-color: var(--bs-navbar-color);
            --bs-nav-link-hover-color: var(--bs-navbar-hover-color);
            --bs-nav-link-disabled-color: var(--bs-navbar-disabled-color);
            display: flex;
            flex-direction: column;
            padding-left: 0;
            margin-bottom: 0;
            list-style: none
        }

        .navbar-nav .nav-link.active {
            color: var(--bs-navbar-active-color)
        }

        .navbar-collapse {
            flex-grow: 1;
            flex-basis: 100%;
            align-items: center
        }

        .navbar-toggler {
            padding: var(--bs-navbar-toggler-padding-y) var(--bs-navbar-toggler-padding-x);
            font-size: var(--bs-navbar-toggler-font-size);
            line-height: 1;
            color: var(--bs-navbar-color);
            background-color: transparent;
            border: var(--bs-border-width) solid var(--bs-navbar-toggler-border-color);
            border-radius: var(--bs-navbar-toggler-border-radius)
        }

        .navbar-toggler-icon {
            display: inline-block;
            width: 1.5em;
            height: 1.5em;
            vertical-align: middle;
            background-image: var(--bs-navbar-toggler-icon-bg);
            background-repeat: no-repeat;
            background-position: center;
            background-size: 100%
        }

        @media (min-width: 992px) {
            .navbar-expand-lg {
                flex-wrap: nowrap;
                justify-content: flex-start
            }

            .navbar-expand-lg .navbar-nav {
                flex-direction: row
            }

            .navbar-expand-lg .navbar-nav .nav-link {
                padding-right: var(--bs-navbar-nav-link-padding-x);
                padding-left: var(--bs-navbar-nav-link-padding-x)
            }

            .navbar-expand-lg .navbar-collapse {
                display: flex !important;
                flex-basis: auto
            }

            .navbar-expand-lg .navbar-toggler {
                display: none
            }
        }

        .navbar-dark {
            --bs-navbar-color: rgba(255, 255, 255, 0.55);
            --bs-navbar-hover-color: rgba(255, 255, 255, 0.75);
            --bs-navbar-disabled-color: rgba(255, 255, 255, 0.25);
            --bs-navbar-active-color: #fff;
            --bs-navbar-brand-color: #fff;
            --bs-navbar-brand-hover-color: #fff;
            --bs-navbar-toggler-border-color: rgba(255, 255, 255, 0.1);
            --bs-navbar-toggler-icon-bg: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.55%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e")
        }

        :root {
            --bs-btn-close-filter:
        }

        :root {
            --bs-carousel-indicator-active-bg: #fff;
            --bs-carousel-caption-color: #fff;
            --bs-carousel-control-icon-filter:
        }

        .d-flex {
            display: flex !important
        }

        .d-none {
            display: none !important
        }

        .position-relative {
            position: relative !important
        }

        .h-100 {
            height: 100% !important
        }

        .flex-row {
            flex-direction: row !important
        }

        .flex-column {
            flex-direction: column !important
        }

        .flex-row-reverse {
            flex-direction: row-reverse !important
        }

        .justify-content-start {
            justify-content: flex-start !important
        }

        .justify-content-center {
            justify-content: center !important
        }

        .justify-content-between {
            justify-content: space-between !important
        }

        .align-items-center {
            align-items: center !important
        }

        .mx-auto {
            margin-right: auto !important;
            margin-left: auto !important
        }

        .me-3 {
            margin-right: 1rem !important
        }

        .me-auto {
            margin-right: auto !important
        }

        .mb-0 {
            margin-bottom: 0 !important
        }

        .mb-2 {
            margin-bottom: .5rem !important
        }

        .mb-4 {
            margin-bottom: 1.5rem !important
        }

        .ms-4 {
            margin-left: 1.5rem !important
        }

        .gap-2 {
            gap: .5rem !important
        }

        .gap-3 {
            gap: 1rem !important
        }

        .text-center {
            text-align: center !important
        }

        .text-decoration-none {
            text-decoration: none !important
        }

        .rounded-2 {
            border-radius: var(--bs-border-radius) !important
        }

        @media (min-width: 768px) {
            .d-md-none {
                display: none !important
            }

            .justify-content-md-start {
                justify-content: flex-start !important
            }

            .align-items-md-center {
                align-items: center !important
            }

            .pt-md-4 {
                padding-top: 1.5rem !important
            }

            .text-md-start {
                text-align: left !important
            }
        }

        @media (min-width: 992px) {
            .d-lg-block {
                display: block !important
            }

            .flex-lg-row {
                flex-direction: row !important
            }

            .mb-lg-0 {
                margin-bottom: 0 !important
            }

            .gap-lg-0 {
                gap: 0 !important
            }
        }

        .header-content h1 {
            -webkit-text-fill-color: #fff0
        }

        .btn-base {
            border: 1px solid #fff0;
            box-shadow: 0 0 0 #fff0
        }

        .watch-card-1 {
            background: linear-gradient(rgb(0 0 0 / .5), rgb(0 0 0 / .5)), url(assets/images/watch-section/bg-1.webp) no-repeat center center
        }

        .watch-card-2 {
            background: linear-gradient(rgb(0 0 0 / .5), rgb(0 0 0 / .5)), url(assets/images/watch-section/bg-2.webp) no-repeat center center
        }

        @media (max-width: 1200px) {
            .watch-card-1 {
                background: linear-gradient(rgb(0 0 0 / .5), rgb(0 0 0 / .5)), url(assets/images/watch-section/bg-1-525x165.webp) no-repeat center center
            }

            .watch-card-2 {
                background: linear-gradient(rgb(0 0 0 / .5), rgb(0 0 0 / .5)), url(assets/images/watch-section/bg-2-525x165.webp) no-repeat center center
            }
        }

        @media (max-width: 768px) {
            .watch-card-1 {
                background: linear-gradient(rgb(0 0 0 / .5), rgb(0 0 0 / .5)), url(assets/images/watch-section/bg-1-520x155.webp) no-repeat center center
            }

            .watch-card-2 {
                background: linear-gradient(rgb(0 0 0 / .5), rgb(0 0 0 / .5)), url(assets/images/watch-section/bg-2-520x155.webp) no-repeat center center
            }
        }

        .watch-card::before {
            background: linear-gradient(108deg, #fff0 45%, rgb(255 255 255 / .818) 50%, #fff0 55%)
        }

        .btn-1::before {
            border-right: 100px solid #fff0
        }
    </style>
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/theme_4/bootstrap/bootstrap.min.css" media="print"
          onload="this.media='all'">


    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
    <link rel="preload" as="image" href="<?php echo base_url() ?>/assets/theme_4/images/header/slide-img-1.webp"
          imagesrcset="assets/images/header/slide-img-1-300x280.webp 300w, assets/images/header/slide-img-1.webp 450w"
          imagesizes="100vw" fetchpriority="high">
    <link rel="preload"
          href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rajdhani:wght@300;400;500;600;700&display=swap"
          as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rajdhani:wght@300;400;500;600;700&display=swap">
    </noscript>

    <style>
        :root {
            --primary-color: #081A70;
            --secondary-color: #F4F4F4;
            --brand-color: #081A70;
            --text-color: #333333;
            --black-1: #0B0F0E;
            --bg-white: #FFFFFF;
            --text-white: #FFFFFF;
            --text-dark: #424242;
            --text-black: #000000;
            --text-muted: #535353;
            --border-radius: 8px;
            --font-poppins: 'Poppins', sans-serif;
            --font-rajdhani: 'Rajdhani', sans-serif
        }

        body {
            font-family: var(--font-poppins);
            margin: 0;
            padding: 0;
            background-color: var(--bg-white);
            box-sizing: border-box
        }

        .header {
            width: 100%;
            height: auto;
            flex-shrink: 0;
            background: linear-gradient(to bottom, #000 10%, #2762e4) no-repeat
        }

        .brand-content {
            margin-left: 15px
        }

        .brand-content p {
            color: var(--text-white);
            margin: 0;
            font-family: Montserrat;
            font-size: 9.765px;
            font-style: normal;
            font-weight: 300;
            line-height: normal
        }

        .recently-veiw-image {
            min-width: 318px;
        }

        .brand-content h4 {
            color: var(--text-white);
            font-family: Inter;
            font-size: 19.71px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            margin-bottom: 8px
        }

        .header-logo {
            min-width: 111px;
        }

        @media (max-width: 768px) {
            .header-logo {
                width: 68px;
                height: auto
            }
        }

        .search-wrapper {
            position: relative;
            width: 100%;
            background-color: #fff0
        }

        .search-input {
            background-color: #fff0;
            width: 100%;
            min-width: 300px;
            padding: 12.5px 16px;
            border: 1px solid #fff;
            border-radius: 104px;
            color: var(--text-white);
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: 130%;
            outline: 0
        }

        .search-icon {
            height: 38px;
            width: 38px;
            border-radius: 50%;
            background: #fff;
            padding: 9px;
            position: absolute;
            top: 50%;
            right: 6px;
            transform: translateY(-50%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @media screen and (max-width: 992px) {
            .nav-small {
                position: fixed;
                z-index: 999;
                bottom: 0;
                background: var(--primary-color);
                width: 100%;
                display: flex !important;
                justify-content: space-between !important;
                left: 0;
                padding: 10px 16px !important
            }

            .cart-count-badge {
                display: flex;
                border: 1px solid var(--bg-white)
            }
        }

        .menu-text {
            margin: 0;
            color: #fdfdfd;
            font-size: 13px;
            font-style: normal;
            font-weight: 400;
            line-height: 120%
        }

        .cart-count-badge {
            position: absolute;
            top: -4px;
            right: -4px;
            background-color: var(--primary-color);
            color: var(--text-white);
            font-size: 14px;
            font-weight: 700;
            padding: 2px 6px;
            border-radius: 50%;
            line-height: 1;
            min-width: 20px;
            text-align: center
        }

        .slider-container {
            position: relative;
            width: 100%;
            height: 595px;
            padding-bottom: 20px
        }

        .swiper {
            width: 100%;
            height: 100%
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff0;
            display: flex;
            justify-content: center;
            align-items: center
        }

        .slider-content-container {
            padding-top: 90px;
            min-height: 444px
        }

        .m-menu-bg {
            background: var(--primary-color);
            font-size: 14px
        }

        .navbar-nav .nav-link {
            color: #fff !important;
            font-weight: 400
        }

        .m-menu-bg .navbar {
            padding: 0
        }

        .dropdown-menu {
            background: #fff;
            border: none;
            border-radius: 6px;
            border-top-left-radius: 0 !important;
            border-top-right-radius: 0 !important;
            width: 220px;
            padding: 0;
            animation: fadeIn .3s ease-in-out
        }

        .dropdown-item {
            padding: 14px 18px;
            color: #5b5b5b;
            font-weight: 500;
            font-size: 14px;
            border-bottom: 1px solid #d0d0d0;
            display: flex;
            align-items: center;
            justify-content: space-between
        }

        .dropdown-menu li:last-child .dropdown-item {
            font-weight: 500;
            border-bottom: none
        }

        .dropdown-submenu .dropdown-menu li:last-child .dropdown-item {
            border-bottom: 1px solid #d0d0d0
        }

        .dropdown-submenu {
            position: relative
        }

        .dropdown-submenu .dropdown-menu {
            top: 50% !important;
            left: 100%;
            margin-top: -1px;
            border-radius: 6px;
            width: 220px;
            animation: fadeIn .3s ease-in-out
        }

        .dropdown-submenu .dropdown-item::after {
            display: none
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        .right-links a {
            color: #fff;
            font-weight: 500;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 6px
        }

        .divider {
            display: inline-block;
            border-left: 1px solid #fff;
            border-right: 1px solid #fff;
            padding: 0 10px;
            margin-left: 10px
        }

        .divider-start {
            display: inline-block;
            border-left: 1px solid #fff;
            padding-left: 10px
        }

        .right-links svg path {
            fill: #fff
        }

        .all-categories {
            color: #fff;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .5px;
            min-width: 220px;
            text-decoration: none
        }

        .m-menu-bg .nav-link {
            padding-top: 0;
            padding-bottom: 0
        }

        .m-menu-bg .dropdown-toggle::after {
            display: none !important
        }

        .all-categories-text {
            padding: 8px 0
        }

        .m-menu-bg .nav-link {
            padding: 0 8px !important;
            margin: 0 11px !important
        }

        @media screen and (max-width: 991px) {
            .right-links a:first-child {
                margin-left: 0
            }

            .right-links {
                padding: 10px 0
            }

            .divider {
                border-left: none;
                padding: 0
            }

            .divider-start {
                border-left: none;
                padding-left: 0
            }

            .m-menu-bg .nav-item {
                padding: 10px 0
            }

            .m-menu-bg .navbar-toggler {
                border: none;
                padding: 0
            }

            .all-categories {
                min-width: 160px
            }
        }

        .dropdown-menu {
            min-width: 200px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgb(0 0 0 / .1)
        }

        .dropdown-submenu {
            position: relative
        }

        .dropdown-submenu .dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -1px
        }

        .dropdown-toggle::after {
            display: none
        }

        .dropdown-icon {
            width: 16px;
            height: 16px;
            margin-left: 8px;
            vertical-align: middle
        }

        @media (max-width: 767.98px) {
            .dropdown-menu {
                min-width: 100%;
                border: none;
                box-shadow: none;
                background-color: #f8f9fa
            }

            .dropdown-submenu .dropdown-menu {
                position: static;
                left: 0;
                padding-left: 8px;
                display: none
            }

            .dropdown-menu.l1,
            .dropdown-menu.l3 {
                background-color: #d4d9fc
            }

            .dropdown-item {
                font-size: 14px;
                padding: 8px 15px
            }

            .custom-dropdown {
                display: block;
                width: 250px
            }

            .custom-dropdown > .dropdown-toggle {
                display: flex;
                align-items: center;
                padding: 0
            }
        }

        @media (max-width: 1200px) {
            .slider-content-container {
                padding-top: 42px;
                padding-bottom: 42px;
            }
        }

        @media (max-width: 768px) {
            .slider-content-container {
                flex-direction: column-reverse;
                justify-content: center;
                align-items: center
            }
        }

        .cards-icons-container {
            position: absolute;
            right: -120px;
            opacity: 0;
            top: 40%
        }

        .cards-icons {
            padding: 0 12px;
            display: flex;
            flex-direction: column;
            gap: 7px
        }

        .cards-icons button {
            background: #fff;
            border: none;
            width: 33px;
            height: 33px;
            border-radius: 50%;
            border: 1px solid #e2e2e2;
            display: flex;
            justify-content: center;
            align-items: center
        }

        @media (max-width: 768px) {
            .cards-icons {
                padding: 0
            }
        }

        .tooltip-icon {
            position: relative
        }

        .tooltip-icon::after {
            content: attr(data-tooltip);
            position: absolute;
            right: 36px;
            background-color: #222;
            color: #fff;
            padding: 3px 6px;
            border-radius: 4px;
            white-space: nowrap;
            font-size: 12px;
            opacity: 0;
            visibility: hidden;
            z-index: 10
        }
    </style>
    <style>
        .search-wrapper {
            background-color: transparent
        }

        .search-input {
            background-color: transparent
        }

        .swiper-slide {
            background: 0 0
        }

        .swiper-slide img {
            /*margin: 12px;*/
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            overflow:hidden;
        }

        .header-content h1 {
            font-family: var(--font-rajdhani);
            font-size: 80px;
            font-style: normal;
            font-weight: 700;
            line-height: 116%;
            background: linear-gradient(90deg, #ebebeb 0, #999 100%);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent
        }

        .header-content p {
            font-size: 20px;
            font-style: normal;
            font-weight: 400;
            line-height: 120%;
            color: var(--text-white)
        }

        .header-content2 {
            padding-bottom: 54px
        }

        .header-content2 img {
            width: 477px;
            height: auto;
            min-width: 300px
        }

        .right-links svg path {
            fill: white
        }

        .dropdown-menu {
            box-shadow: 0 4px 8px rgba(0, 0, 0, .1)
        }

        @media (min-width: 1200px) {
            .header-content h1 {
                min-height: 162px;
            }
        }

        @media (max-width: 1200px) {
            .header-content h1 {
                font-size: 60px;
                line-height: 120%
            }

            .header-content p {
                font-size: 18px
            }

            .header-content2 {
                padding-bottom: 0
            }

            .header-content2 img {
                width: 280px;
                height: auto;
                min-width: 300px
            }
        }

        @media (min-width: 506px) and (max-width: 768px) {
            .header-content h1 {
                min-height: 50px;
            }
        }

        @media (max-width: 505px) {
            .header-content h1 {
                min-height: 96px;
            }
        }

        @media (max-width: 768px) {
            .header-content h1 {
                font-size: 40px;
                line-height: 120%;

            }

            .header-content2 img {
                width: 300px;
                height: auto;
                min-height: 250px;
                margin: 0 auto;
            }
        }

        .btn-base {
            display: inline-flex;
            padding: 14px 20px;
            justify-content: center;
            align-items: center;
            gap: 10px;
            border-radius: 10px;
            background: var(--bg-white);
            color: var(--primary-color);
            font-size: 20px;
            font-style: normal;
            font-weight: 400;
            line-height: 120%;
            border: 1px solid transparent;
            box-shadow: 0 0 0 transparent;
            text-decoration: none;
            z-index: 10
        }

        @media (max-width: 768px) {
            .btn-base {
                padding: 12px 18px;
                font-size: 18px
            }
        }

        .watch-section {
            margin-top: 70px
        }

        .watch-card-1 {
            height: 182px;
            width: 100%;
            border-radius: 10px;
            background: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url('assets/images/watch-section/bg-1.webp') no-repeat center center;
            background-size: cover;
            background-position: center
        }

        .watch-card-2 {
            height: 182px;
            width: 100%;
            border-radius: 10px;
            background: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url('assets/images/watch-section/bg-2.webp') no-repeat center center;
            background-size: cover;
            background-position: center
        }

        @media (max-width: 1200px) {
            .watch-card-1 {
                background: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url('assets/images/watch-section/bg-1-525x165.webp') no-repeat center center
            }

            .watch-card-2 {
                background: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url('assets/images/watch-section/bg-2-525x165.webp') no-repeat center center
            }
        }

        @media (max-width: 768px) {
            .times-to-shop-inner-content h2 {
                font-size: 48px;
            }

            .watch-card-1 {
                background: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url('assets/images/watch-section/bg-1-520x155.webp') no-repeat center center
            }

            .watch-card-2 {
                background: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url('assets/images/watch-section/bg-2-520x155.webp') no-repeat center center
            }
        }

        .watch-card {
            color: var(--text-white);
            height: 100%;
            width: 100%;
            position: relative;
            overflow: hidden;
            background-color: #f8f9fa;
            border-radius: 8px
        }

        .watch-card::before {
            content: "";
            position: absolute;
            top: -10%;
            left: -10%;
            width: 120%;
            height: 120%;
            background: linear-gradient(108deg, rgba(0, 0, 0, 0) 45%, rgba(255, 255, 255, .818) 50%, rgba(0, 0, 0, 0) 55%);
            transform: translateX(-100%);
            z-index: 1;
            opacity: 0
        }

        .watch-card p {
            margin-top: 0;
            font-size: 13px;
            font-style: normal;
            font-weight: 400;
            line-height: 120%
        }

        .watch-card a {
            display: inline-block;
            margin-top: auto;
            padding: 7px 16px;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: 130%;
            color: #242424
        }

        @media (max-width: 768px) {
            .watch-section {
                margin-top: 48px
            }
        }

        .testimonial-section {
            margin-top: 80px
        }

        .testimonial-single-item {
            text-align: center
        }

        .testimonial-image-container {
            width: 87px;
            height: 87px;
            border-radius: 50%;
            background-color: #eaeeff
        }

        .testimonial-image-container img {
            will-change: transform
        }

        @media (max-width: 768px) {
            .testimonial-section {
                margin-top: 48px
            }
        }

        .btn-1 {
            position: relative;
            display: inline-block;
            overflow: hidden
        }

        .btn-1.slower {
            position: relative;
            display: inline-block;
            overflow: hidden
        }

        .btn-1::before {
            content: '';
            position: absolute;
            top: 0;
            left: -50px;
            bottom: 0;
            right: 0;
            width: 430px;
            border-right: 100px solid transparent;
            border-bottom: 152px solid var(--primary-color);
            transform: translateX(-100%);
            z-index: -1
        }
    </style>
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/theme_4/swiper-js/swiper-bundle.min.css" media="print"
          onload="this.media='all'">
    <noscript>
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/theme_4/swiper-js/swiper-bundle.min.css">
    </noscript>
    <!-- Animate.css (non-critical, async load) -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/theme_4/animate/animate.min.css" media="print"
          onload="this.media='all'">
    <noscript>
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/theme_4/animate/animate.min.css">
    </noscript>

    <!-- Preload CSS -->
    <link rel="preload" href="<?php echo base_url() ?>/assets/theme_4/css/style-minify.css" as="style"
          onload="this.onload=null;this.rel='stylesheet'">

    <!-- Fallback for no-JS users -->
    <noscript>
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/theme_4/css/style-minify.css">
    </noscript>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
    <style>
        .recently-viewed-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .recently-viewed-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transform: translateY(-3px);
            transition: all 0.3s ease;
        }

        .best-seller-card {
            transition: transform 0.3s ease;
        }

        .best-seller-card:hover {
            transform: translateY(-3px);
            transition: all 0.3s ease;
        }

        .search-toggle-icon {
            width: 16px;
            /* svg width */
            height: 16px;
            /* svg height */
            display: inline-block;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" fill="none"><path d="M24.7917 24.7918L31.1667 31.1668" stroke="%23CACACA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M28.3333 15.5834C28.3333 8.54181 22.6249 2.83344 15.5833 2.83344C8.54163 2.83344 2.83325 8.54181 2.83325 15.5834C2.83325 22.6251 8.54163 28.3334 15.5833 28.3334C22.6249 28.3334 28.3333 22.6251 28.3333 15.5834Z" stroke="%23CACACA" stroke-width="1.5" stroke-linejoin="round"/></svg>') !important;

        }

        /* Header Section */
        .header-top {
            background: var(--primary-color);
            color: var(--text-white);
            padding: 12px;
            font-size: 14px;
            font-style: normal;
            font-weight: 500;

            background: radial-gradient(35.91% 1292.86% at 50% 50%, #1864E4 -50%, #000000 100%);
        }

        .header-top-badge {
            color: #FFF;
            font-size: 12px;
            font-style: normal;
            font-weight: 500;
            line-height: 100%;
            padding: 3px 7px 3px 8px;
            border-radius: 23px;
            background: #1b6bfd;
            margin-left: 16px;
        }
    </style>


    <?= $this->renderSection('caa_link') ?>

</head>
<body>
<div class="message_alert"  id="messAlt">
    <div class="alert-success_web py-2 px-3 border-0 text-white fs-5 text-capitalize" id="mesVal"> Update Successfully </div>
</div>
<button id="scrollToTopBtn" title="Go to top">↑</button>
<header class="header">
    <div class="header-top ">
        <p class="my-0 text-center">New season coming! Discount 10% for all product! Checkout Now! <span
                class="header-top-badge">20:40</span></p>
    </div>
    <!-- Navigation Start  -->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark pt-md-4">
            <div class="container-fluid flex-row-reverse flex-lg-row gap-3 gap-lg-0 px-0">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarTogglerDemo03"
                        aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon search-toggle-icon"></span>
                </button>

                <a class="navbar-brand" href="<?php echo base_url() ?>">
                    <?php $logoImg = get_lebel_by_value_in_theme_settings('side_logo');
                    $alt_name      = getLebelByAltNameInThemeSettings('side_logo');
                    echo image_view('uploads/logo', '', $logoImg, 'noimage.png', 'header-logo', $alt_name, 'side_log'); ?>

                </a>
                <?php $modules = modules_access(); ?>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <div class="mx-auto mb-2 mb-lg-0">
                        <form id="first-form-top" class="d-flex" action="<?php echo base_url('products/search'); ?>"
                              method="GET">
                            <div class="search-wrapper">
                                <button class="search-icon"
                                        onclick="topSearchValidation('first-form-top','first-cat','first-keywordTop','first-valid')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17"
                                         fill="none">
                                        <path
                                            d="M11.8889 12.3889L15 15.5M1 7.72222C1 9.37246 1.65555 10.9551 2.82245 12.122C3.98934 13.2889 5.57199 13.9444 7.22222 13.9444C8.87246 13.9444 10.4551 13.2889 11.622 12.122C12.7889 10.9551 13.4444 9.37246 13.4444 7.72222C13.4444 6.07199 12.7889 4.48934 11.622 3.32245C10.4551 2.15555 8.87246 1.5 7.22222 1.5C5.57199 1.5 3.98934 2.15555 2.82245 3.32245C1.65555 4.48934 1 6.07199 1 7.72222Z"
                                            stroke="#081A70" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"/>
                                    </svg>
                                </button>
                                <input class="search-input" type="search" name="keywordTop"
                                       placeholder="Search for Products..." aria-label="Search"
                                       value="<?php echo isset($keywordTop) ? $keywordTop : ''; ?>">
                            </div>
                        </form>
                    </div>
                </div>


                <ul class="navbar-nav d-flex flex-row gap-3 align-items-center justify-content-center nav-small">
                    <?php if ($modules['compare'] == 1) { ?>
                        <li class="nav-item">
                            <a class="nav-link active d-flex flex-column gap-2 justify-content-center align-items-center"
                               aria-current="page" href="<?php echo base_url('compare') ?>">
                            <span class="menu-icon position-relative">
                              <img
                                  src="<?php echo base_url() ?>/assets/theme_4/images/menu-icons/famicons_git-compare-outline.svg"
                                  fetchpriority="high"
                                  decoding="async" loading="eager" alt="compare-outline">
                                <span class="cart-count-badge"
                                      id="comparetReload"> <?php print (isset(newSession()->compare_session)) ? count(newSession()->compare_session) : '0'; ?></span>
                            </span>

                                <p class="menu-text">Compare</p>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if ($modules['wishlist'] == 1) { ?>
                        <li class="nav-item">
                            <a class="nav-link active d-flex flex-column gap-2 justify-content-center align-items-center"
                               aria-current="page" href="<?php echo base_url('favorite') ?>">
                                <span class="menu-icon">
                                  <img src="<?php echo base_url() ?>/assets/theme_4/images/menu-icons/favorite-outline.svg"
                                       fetchpriority="high" decoding="async"
                                       loading="eager" alt="favorite icon">
                                </span>
                                <p class="menu-text">Wishlist</p>
                            </a>
                        </li>
                    <?php } ?>

                    <li class="nav-item">
                        <a class="nav-link active d-flex flex-column gap-2 justify-content-center align-items-center"
                           aria-current="page" href="<?php echo base_url('cart') ?>">
                            <span class="menu-icon position-relative">
                              <img src="<?php echo base_url() ?>/assets/theme_4/images/menu-icons/cart.svg"
                                   fetchpriority="high"
                                   decoding="async" loading="eager"
                                   alt="cart icon">
                              <span class="cart-count-badge"
                                    id="cartReload"><?php echo count(Cart()->contents()); ?></span>
                                <!-- Example count -->
                            </span>
                            <p class="menu-text">Cart</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <?php if (!isset(newSession()->isLoggedInCustomer)) { ?>
                        <a class="nav-link active d-flex flex-column gap-2 justify-content-center align-items-center"
                           aria-current="page" href="<?= base_url('login') ?>">
                            <span class="menu-icon">
                              <img src="<?= base_url() ?>/assets/theme_4/images/menu-icons/iconamoon_profile-light.svg"
                                   fetchpriority="high" decoding="async"
                                   loading="eager" alt="account icon">
                            </span>
                            <p class="menu-text">Sign In</p>
                        </a>
                        <?php } else { ?>
                            <a class="nav-link active d-flex flex-column gap-2 justify-content-center align-items-center"
                               aria-current="page" href="<?= base_url('dashboard') ?>">
                            <span class="menu-icon">
                              <img src="<?= base_url() ?>/assets/theme_4/images/menu-icons/iconamoon_profile-light.svg"
                                   fetchpriority="high" decoding="async"
                                   loading="eager" alt="account icon">
                            </span>
                                <p class="menu-text">Dashboard</p>
                            </a>
                        <?php } ?>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="m-menu-bg">
        <nav class="navbar navbar-expand-lg navbar-dark container">
            <div class="container-fluid justify-content-start align-items-center">

                <!-- All Categories OUTSIDE collapsible -->

                <!-- Toggler for mobile -->
                <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                        aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="me-3">
                    <div class="custom-dropdown dropdown">
                        <a class="dropdown-toggle all-categories d-flex align-items-center" href="#" id="customDropdown"
                           role="button" aria-expanded="false">
                            <span class="d-none d-lg-block me-3">
                              <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18"
                                   fill="none">
                                <path
                                    d="M0 0.5V2.93902H19V0.5H0ZM0 7.7439V10.1829H19V7.7439H0ZM0 15.061V17.5H19V15.061H0Z"
                                    fill="#C8C8C8"/>
                              </svg>
                            </span>
                            <span class="all-categories-text">
                              All Categories
                            </span>
                            <span class="ms-4">
                              <svg class="dropdown-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                   stroke-width="2"
                                   stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 18l6-6-6-6"/>
                              </svg>
                            </span>

                        </a>
                        <ul class="dropdown-menu" aria-labelledby="customDropdown">
                            <?php foreach (getSideMenuArray() as $pcat) { ?>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle"
                                       href="<?php echo base_url('category/' . $pcat->prod_cat_id); ?>" role="button"
                                       aria-expanded="false">
                                        <?php echo $pcat->category_name; ?>
                                        <?php $fCat = getCategoryBySubArray($pcat->prod_cat_id);

                                        if (!empty(count($fCat))) { ?>
                                            <svg class="dropdown-icon" viewBox="0 0 24 24" fill="none"
                                                 stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                 stroke-linejoin="round">
                                                <path d="M9 18l6-6-6-6"/>
                                            </svg>
                                        <?php } ?>
                                    </a>
                                    <?php if (!empty(count($fCat))) { ?>
                                        <ul class="dropdown-menu l1">
                                            <?php foreach ($fCat as $sCat) { ?>
                                                <li class="dropdown-submenu">
                                                    <a class="dropdown-item dropdown-toggle"
                                                       href="<?php echo base_url('category/' . $sCat->prod_cat_id); ?>"
                                                       role="button"
                                                       aria-expanded="false">
                                                        <?php echo $sCat->category_name; ?>
                                                        <?php $sSubCat = getCategoryBySubArray($sCat->prod_cat_id);

                                                        if (!empty(count($sSubCat))) { ?>
                                                            <svg class="dropdown-icon" viewBox="0 0 24 24" fill="none"
                                                                 stroke="currentColor"
                                                                 stroke-width="2" stroke-linecap="round"
                                                                 stroke-linejoin="round">
                                                                <path d="M9 18l6-6-6-6"/>
                                                            </svg>
                                                        <?php } ?>

                                                    </a>
                                                    <?php if (!empty(count($sSubCat))) { ?>
                                                        <ul class="dropdown-menu l2">
                                                            <?php foreach ($sSubCat as $ssCat) { ?>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item dropdown-toggle"
                                                                       href="<?php echo base_url('category/' . $ssCat->prod_cat_id); ?>"
                                                                       role="button"
                                                                       aria-expanded="false">
                                                                        <?php echo $ssCat->category_name; ?>
                                                                    </a>
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                    <?php } ?>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

                <!-- Collapsible Menu -->
                <div class="collapse navbar-collapse" id="mainNavbar">
                    <ul class="navbar-nav me-auto align-items-md-center">
                        <li class="nav-item divider-start"><a class="nav-link" aria-current="page"
                                                              href="<?php echo base_url() ?>">Home</a></li>
                        <?php echo top_menu(); ?>
                        <?php if ($modules['album'] == 1) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('qc-picture') ?>">Album</a>
                            </li>
                        <?php } ?>
                        <?php if ($modules['blog'] == 1) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('blog') ?>">Blog</a>
                            </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('page/about-us') ?>">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('page/contact-us') ?>">Contact us</a>
                        </li>
                    </ul>

                    <!-- Right Links -->
                    <div class="right-links d-flex align-items-center">
                        <ul class="mb-0">
                            <li class="divider-start">

                                <a href="#">
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                               fill="none">
                        <path
                            d="M11.469 8.93125C11.5815 8.98125 11.7002 9 11.8127 9C12.069 9 12.319 8.89375 12.5002 8.7L13.9627 7.125H15.8752C16.9065 7.125 17.7502 6.28125 17.7502 5.25V2.125C17.7502 1.09375 16.9065 0.25 15.8752 0.25H10.8752C9.84399 0.25 9.00024 1.09375 9.00024 2.125V5.24375C9.00024 6.275 9.84399 7.11875 10.8752 7.11875V8.05625C10.8752 8.45 11.1065 8.7875 11.469 8.93125ZM10.2502 2.125C10.2502 1.78125 10.5315 1.5 10.8752 1.5H15.8752C16.219 1.5 16.5002 1.78125 16.5002 2.125V5.25C16.5002 5.59375 16.219 5.875 15.8752 5.875H13.4127L12.1252 7.2625V5.875H10.8752C10.5315 5.875 10.2502 5.59375 10.2502 5.25V2.125ZM5.56274 10.25C3.83774 10.25 2.43774 8.85 2.43774 7.125C2.43774 5.4 3.83774 4 5.56274 4C7.28774 4 8.68774 5.4 8.68774 7.125C8.68774 8.85 7.28774 10.25 5.56274 10.25ZM5.56274 5.25C4.53149 5.25 3.68774 6.09375 3.68774 7.125C3.68774 8.15625 4.53149 9 5.56274 9C6.59399 9 7.43774 8.15625 7.43774 7.125C7.43774 6.09375 6.59399 5.25 5.56274 5.25ZM5.56274 17.7437C3.75024 17.7437 2.36274 17.2437 1.42524 16.2638C0.218368 15.0044 0.246492 13.3981 0.249617 13.24V13.2294C0.250242 12.2875 1.03774 11.5 2.01274 11.5H9.11274C10.0815 11.5 10.8752 12.2869 10.8752 13.2606V13.2669C10.8777 13.3806 10.9127 14.9981 9.70024 16.27C8.76274 17.2506 7.37524 17.75 5.56274 17.75V17.7437ZM2.01274 12.7487C1.73149 12.7487 1.50024 12.98 1.50024 13.2613V13.265C1.49837 13.3544 1.48274 14.5306 2.33774 15.415C3.02524 16.1331 4.11274 16.495 5.56274 16.495C7.01274 16.495 8.09399 16.1325 8.78774 15.415C9.66274 14.5094 9.63149 13.2981 9.62524 13.2856C9.62524 12.9794 9.39399 12.7487 9.11274 12.7487H2.01274Z"
                            fill="white"/>
                      </svg></span>
                                    Feed Back
                                </a>
                            </li>
                            <li class="divider">
                                <a href="#" class="">
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="14" height="18" viewBox="0 0 14 18"
                               fill="none">
                        <path
                            d="M7 13.5C6.49719 13.5001 6.01279 13.3108 5.64327 12.9698C5.27375 12.6289 5.04622 12.1612 5.006 11.66C3.67219 11.1879 2.54805 10.2597 1.83202 9.03936C1.116 7.81901 0.854122 6.38493 1.09263 4.99027C1.33113 3.59561 2.05467 2.33005 3.13554 1.41698C4.21641 0.503917 5.5851 0.00206045 7 6.3094e-08C8.50489 -0.000218052 9.95492 0.565087 11.0626 1.58383C12.1702 2.60256 12.8546 4.00034 12.98 5.5C12.9842 5.56505 12.9748 5.63026 12.9524 5.69148C12.93 5.7527 12.8952 5.8086 12.85 5.85562C12.8049 5.90264 12.7504 5.93976 12.6902 5.96461C12.6299 5.98947 12.5652 6.00152 12.5 6C12.3661 5.99664 12.2381 5.94361 12.1411 5.8512C12.0441 5.7588 11.9849 5.63362 11.975 5.5C11.8859 4.61584 11.5628 3.77138 11.039 3.05357C10.5151 2.33576 9.80942 1.77054 8.99453 1.41609C8.17964 1.06163 7.28501 0.930763 6.40274 1.03694C5.52046 1.14313 4.68243 1.48252 3.97491 2.0202C3.26739 2.55787 2.71594 3.2744 2.37735 4.096C2.03876 4.9176 1.92525 5.8146 2.04851 6.69465C2.17177 7.5747 2.52734 8.406 3.07863 9.10297C3.62991 9.79994 4.35699 10.3374 5.185 10.66C5.33566 10.3345 5.57111 10.0554 5.86667 9.85213C6.16224 9.64885 6.50703 9.5288 6.86493 9.50457C7.22283 9.48033 7.58067 9.55281 7.90094 9.71439C8.2212 9.87597 8.49212 10.1207 8.68529 10.423C8.87846 10.7253 8.98679 11.0739 8.99891 11.4324C9.01103 11.7909 8.9265 12.1461 8.75418 12.4607C8.58186 12.7754 8.32809 13.0379 8.01947 13.2207C7.71084 13.4035 7.35872 13.5 7 13.5ZM2.009 11H2.1C2.49 11.381 2.923 11.717 3.392 12H2.009C1.448 12 1 12.447 1 13C1 14.309 1.622 15.284 2.673 15.953C3.743 16.636 5.265 17 7 17C8.735 17 10.257 16.636 11.327 15.953C12.377 15.283 13 14.31 13 13C13 12.7348 12.8946 12.4804 12.7071 12.2929C12.5196 12.1054 12.2652 12 12 12H9.959C10.0149 11.669 10.0149 11.331 9.959 11H12C12.5304 11 13.0391 11.2107 13.4142 11.5858C13.7893 11.9609 14 12.4696 14 13C14 14.691 13.167 15.966 11.865 16.797C10.583 17.614 8.855 18 7 18C5.145 18 3.417 17.614 2.135 16.797C0.833 15.967 0 14.69 0 13C0 11.887 0.903 11 2.009 11ZM11 6C11.0002 6.67664 10.8288 7.34227 10.5017 7.93463C10.1747 8.52698 9.70273 9.02669 9.13 9.387C8.86304 9.11781 8.54747 8.90166 8.2 8.75C8.83168 8.47431 9.34917 7.98953 9.66546 7.37716C9.98174 6.7648 10.0775 6.06221 9.93672 5.38753C9.7959 4.71284 9.42708 4.10722 8.89225 3.6725C8.35742 3.23777 7.68922 3.00045 7 3.00045C6.31078 3.00045 5.64258 3.23777 5.10775 3.6725C4.57293 4.10722 4.2041 4.71284 4.06328 5.38753C3.92247 6.06221 4.01826 6.7648 4.33454 7.37716C4.65083 7.98953 5.16832 8.47431 5.8 8.75C5.45 8.903 5.135 9.12 4.87 9.387C4.11042 8.90932 3.53351 8.19012 3.232 7.345C3.07818 6.91327 2.99971 6.45831 3 6C3 4.93913 3.42143 3.92172 4.17157 3.17157C4.92172 2.42143 5.93913 2 7 2C8.06087 2 9.07828 2.42143 9.82843 3.17157C10.5786 3.92172 11 4.93913 11 6Z"
                            fill="white"/>
                      </svg></span>
                                    Support
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

    </div>


</header>

<?= $this->renderSection('content'); ?>

<footer class=" text-light text-md-start text-center">
    <div class="container footer">
        <div class="row justify-content-center">
            <div class="d-flex d-md-none align-items-center justify-content-md-start justify-content-center mb-4">

                <?= image_view('uploads/logo', '', $logoImg, 'noimage.png', 'logo', $alt_name, 'side_log'); ?>

            </div>
            <div class="col-md-3 mb-4 ">
                <h5 class="fw-bold">Customer Service</h5>
                <ul class="list-unstyled">
                    <li class="footer-menu"><a href="<?php echo base_url('page/returns-policy') ?>"
                                               class="text-light text-decoration-none"><span
                                class="menu-arrow"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                    fill="none">
                    <path
                        d="M5.11523 2.68945L4.32422 3.49805L9.82617 9L4.32422 14.502L5.11523 15.3105L11.4258 9L5.11523 2.68945ZM9.05273 2.68945L8.26172 3.49805L13.7637 9L8.26172 14.502L9.05273 15.3105L15.3633 9L9.05273 2.68945Z"
                        fill="#fff"/>
                  </svg></span> Returns</a></li>
                    <li class="footer-menu"><a href="<?php echo base_url('page/contact-us') ?>"
                                               class="text-light text-decoration-none"><span
                                class="menu-arrow"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                    fill="none">
                    <path
                        d="M5.11523 2.68945L4.32422 3.49805L9.82617 9L4.32422 14.502L5.11523 15.3105L11.4258 9L5.11523 2.68945ZM9.05273 2.68945L8.26172 3.49805L13.7637 9L8.26172 14.502L9.05273 15.3105L15.3633 9L9.05273 2.68945Z"
                        fill="#fff"/>
                  </svg></span> Contact us</a></li>
                    <li class="footer-menu"><a href="<?php echo base_url('page/site-map') ?>"
                                               class="text-light text-decoration-none"><span
                                class="menu-arrow"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                    fill="none">
                    <path
                        d="M5.11523 2.68945L4.32422 3.49805L9.82617 9L4.32422 14.502L5.11523 15.3105L11.4258 9L5.11523 2.68945ZM9.05273 2.68945L8.26172 3.49805L13.7637 9L8.26172 14.502L9.05273 15.3105L15.3633 9L9.05273 2.68945Z"
                        fill="#fff"/>
                  </svg></span> Site Map</a></li>
                </ul>
                <div class="d-md-flex d-none align-items-center justify-content-start">
                    <?= image_view('uploads/logo', '', $logoImg, 'noimage.png', 'header-logo footer-logo-bottom', $alt_name, 'side_log'); ?>
                </div>
            </div>
            <div class="col-md-3  mb-4 ">
                <h5 class="fw-bold">Information</h5>
                <ul class="list-unstyled">
                    <li class="footer-menu"><a href="#" class="text-light text-decoration-none"> <span
                                class="menu-arrow"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                    fill="none">
                    <path
                        d="M5.11523 2.68945L4.32422 3.49805L9.82617 9L4.32422 14.502L5.11523 15.3105L11.4258 9L5.11523 2.68945ZM9.05273 2.68945L8.26172 3.49805L13.7637 9L8.26172 14.502L9.05273 15.3105L15.3633 9L9.05273 2.68945Z"
                        fill="#fff"/>
                  </svg></span> Our Core Values</a></li>
                    <li class="footer-menu"><a href="<?php echo base_url('page/about-us') ?>"
                                               class="text-light text-decoration-none"><span
                                class="menu-arrow"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                    fill="none">
                    <path
                        d="M5.11523 2.68945L4.32422 3.49805L9.82617 9L4.32422 14.502L5.11523 15.3105L11.4258 9L5.11523 2.68945ZM9.05273 2.68945L8.26172 3.49805L13.7637 9L8.26172 14.502L9.05273 15.3105L15.3633 9L9.05273 2.68945Z"
                        fill="#fff"/>
                  </svg></span> About Us</a></li>
                    <li class="footer-menu"><a href="<?php echo base_url('page/privacy-policy') ?>"
                                               class="text-light text-decoration-none"><span
                                class="menu-arrow"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                    fill="none">
                    <path
                        d="M5.11523 2.68945L4.32422 3.49805L9.82617 9L4.32422 14.502L5.11523 15.3105L11.4258 9L5.11523 2.68945ZM9.05273 2.68945L8.26172 3.49805L13.7637 9L8.26172 14.502L9.05273 15.3105L15.3633 9L9.05273 2.68945Z"
                        fill="#fff"/>
                  </svg></span> Privacy Policy</a></li>
                    <li class="footer-menu"><a href="#" class="text-light text-decoration-none"><span
                                class="menu-arrow"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                    fill="none">
                    <path
                        d="M5.11523 2.68945L4.32422 3.49805L9.82617 9L4.32422 14.502L5.11523 15.3105L11.4258 9L5.11523 2.68945ZM9.05273 2.68945L8.26172 3.49805L13.7637 9L8.26172 14.502L9.05273 15.3105L15.3633 9L9.05273 2.68945Z"
                        fill="#fff"/>
                  </svg></span> Returns and Refunds</a></li>
                    <li class="footer-menu"><a href="<?php echo base_url('page/terms-and-conditions') ?>"
                                               class="text-light text-decoration-none"><span
                                class="menu-arrow"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                    fill="none">
                    <path
                        d="M5.11523 2.68945L4.32422 3.49805L9.82617 9L4.32422 14.502L5.11523 15.3105L11.4258 9L5.11523 2.68945ZM9.05273 2.68945L8.26172 3.49805L13.7637 9L8.26172 14.502L9.05273 15.3105L15.3633 9L9.05273 2.68945Z"
                        fill="#fff"/>
                  </svg></span> Terms & conditions</a></li>
                </ul>

            </div>
            <div class="col-md-3  mb-4 ">
                <h5 class="fw-bold">Extras</h5>
                <ul class="list-unstyled">
                    <li class="footer-menu"><a href="#" class="text-light text-decoration-none"><span
                                class="menu-arrow"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                    fill="none">
                    <path
                        d="M5.11523 2.68945L4.32422 3.49805L9.82617 9L4.32422 14.502L5.11523 15.3105L11.4258 9L5.11523 2.68945ZM9.05273 2.68945L8.26172 3.49805L13.7637 9L8.26172 14.502L9.05273 15.3105L15.3633 9L9.05273 2.68945Z"
                        fill="#fff"/>
                  </svg></span> Brands</a></li>
                    <li class="footer-menu"><a href="<?php echo base_url('dashboard') ?>"
                                               class="text-light text-decoration-none"><span
                                class="menu-arrow"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                    fill="none">
                    <path
                        d="M5.11523 2.68945L4.32422 3.49805L9.82617 9L4.32422 14.502L5.11523 15.3105L11.4258 9L5.11523 2.68945ZM9.05273 2.68945L8.26172 3.49805L13.7637 9L8.26172 14.502L9.05273 15.3105L15.3633 9L9.05273 2.68945Z"
                        fill="#fff"/>
                  </svg></span> My Account</a></li>
                    <li class="footer-menu"><a href="<?php echo base_url('my-order'); ?>"
                                               class="text-light text-decoration-none"><span
                                class="menu-arrow"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                    fill="none">
                    <path
                        d="M5.11523 2.68945L4.32422 3.49805L9.82617 9L4.32422 14.502L5.11523 15.3105L11.4258 9L5.11523 2.68945ZM9.05273 2.68945L8.26172 3.49805L13.7637 9L8.26172 14.502L9.05273 15.3105L15.3633 9L9.05273 2.68945Z"
                        fill="#fff"/>
                  </svg></span> Order History</a></li>
                    <li class="footer-menu"><a href="<?php echo base_url('favorite'); ?>"
                                               class="text-light text-decoration-none"><span
                                class="menu-arrow"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                    fill="none">
                    <path
                        d="M5.11523 2.68945L4.32422 3.49805L9.82617 9L4.32422 14.502L5.11523 15.3105L11.4258 9L5.11523 2.68945ZM9.05273 2.68945L8.26172 3.49805L13.7637 9L8.26172 14.502L9.05273 15.3105L15.3633 9L9.05273 2.68945Z"
                        fill="#fff"/>
                  </svg></span> Wish List</a></li>
                    <li class="footer-menu"><a href="#" class="text-light text-decoration-none"><span
                                class="menu-arrow"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                    fill="none">
                    <path
                        d="M5.11523 2.68945L4.32422 3.49805L9.82617 9L4.32422 14.502L5.11523 15.3105L11.4258 9L5.11523 2.68945ZM9.05273 2.68945L8.26172 3.49805L13.7637 9L8.26172 14.502L9.05273 15.3105L15.3633 9L9.05273 2.68945Z"
                        fill="#fff"/>
                  </svg></span> Newsletter</a></li>
                </ul>
            </div>
            <?php $settings = get_settings(); ?>
            <div class="col-md-3  mb-4 ">
                <h5 class="fw-bold">Contact Us</h5>
                <ul class="list-unstyled">
                    <li class="footer-menu"><a href="tel:<?= $settings['phone']; ?>"
                                               class="text-light text-decoration-none"><span
                                class="menu-arrow">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M6.49218 2.25C6.0996 2.25 5.71288 2.39063 5.39062 2.64844L5.34374 2.67188L5.32031 2.69531L2.97655 5.10938L2.99999 5.13281C2.27636 5.80078 2.0537 6.79981 2.36718 7.66406C2.37011 7.66992 2.36425 7.68164 2.36718 7.6875C3.00292 9.50684 4.6289 13.0195 7.80468 16.1953C10.9922 19.3828 14.5518 20.9443 16.3125 21.6328H16.3359C17.2471 21.9375 18.2344 21.7207 18.9375 21.1172L21.3047 18.75C21.9258 18.1289 21.9258 17.0508 21.3047 16.4297L18.2578 13.3828L18.2344 13.3359C17.6133 12.7148 16.5117 12.7148 15.8906 13.3359L14.3906 14.8359C13.8486 14.5752 12.5566 13.9072 11.3203 12.7266C10.0928 11.5547 9.46581 10.207 9.23437 9.67969L10.7344 8.17969C11.3643 7.54981 11.376 6.50098 10.7109 5.88281L10.7344 5.85938L10.6641 5.78906L7.66406 2.69531L7.64062 2.67188L7.59374 2.64844C7.27148 2.39063 6.88476 2.25 6.49218 2.25ZM6.49218 3.75C6.54785 3.75 6.60351 3.77637 6.65624 3.82031L9.65624 6.89063L9.72656 6.96094C9.7207 6.95508 9.7705 7.03418 9.67968 7.125L7.80468 9L7.45312 9.32813L7.61718 9.79688C7.61718 9.79688 8.47851 12.1025 10.2891 13.8281L10.4531 13.9688C12.1963 15.5596 14.25 16.4297 14.25 16.4297L14.7187 16.6406L16.9453 14.4141C17.0742 14.2852 17.0508 14.2852 17.1797 14.4141L20.25 17.4844C20.3789 17.6133 20.3789 17.5664 20.25 17.6953L17.9531 19.9922C17.6074 20.2881 17.2412 20.3496 16.8047 20.2031C15.1055 19.5352 11.8037 18.085 8.85937 15.1406C5.89159 12.1729 4.34179 8.80664 3.77343 7.17188C3.65917 6.86719 3.7412 6.41602 4.0078 6.1875L4.05468 6.14063L6.32812 3.82031C6.38085 3.77637 6.43652 3.75 6.49218 3.75Z"
                        fill="white"/>
                  </svg></span> <?= $settings['phone']; ?></a></li>
                    <li class="footer-menu"><a href="tel:0123456789" class="text-light text-decoration-none"><span
                                class="menu-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24"
                                                        fill="none">
                    <path
                        d="M9 3.75V7.5H7.5V6H3V19.5H4.5V20.25C4.5 21.4834 5.5166 22.5 6.75 22.5C7.9834 22.5 9 21.4834 9 20.25V19.5H21V7.5H18V3.75H9ZM10.5 5.25H16.5V9H10.5V5.25ZM4.5 7.5H6V18H4.5V7.5ZM7.5 9H9V10.5H18V9H19.5V18H7.5V9ZM9.75 12V13.5H11.25V12H9.75ZM12.75 12V13.5H14.25V12H12.75ZM15.75 12V13.5H17.25V12H15.75ZM9.75 15V16.5H11.25V15H9.75ZM12.75 15V16.5H14.25V15H12.75ZM15.75 15V16.5H17.25V15H15.75ZM6 19.5H7.5V20.25C7.5 20.666 7.16602 21 6.75 21C6.33398 21 6 20.666 6 20.25V19.5Z"
                        fill="white"/>
                  </svg></span> <?= $settings['phone']; ?></a></li>
                    <li class="footer-menu"><a href="mailto:<?= $settings['email']; ?>"
                                               class="text-light text-decoration-none"><span
                                class="menu-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24"
                                                        fill="none">
                    <path
                        d="M2.25 6V19.5H21.75V6H2.25ZM5.48438 7.5H18.5156L12 11.8359L5.48438 7.5ZM3.75 8.15625L11.5781 13.3828L12 13.6406L12.4219 13.3828L20.25 8.15625V18H3.75V8.15625Z"
                        fill="white"/>
                  </svg></span> <?= $settings['email']; ?></a></li>
                    <li class="footer-menu"><a href="" class="text-light text-decoration-none"><span class="menu-arrow">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M12 2.25C8.28223 2.25 5.25 5.28223 5.25 9C5.25 10.0547 5.67773 11.2646 6.25781 12.5859C6.83789 13.9072 7.58496 15.3105 8.34375 16.6172C9.86133 19.2334 11.3906 21.4219 11.3906 21.4219L12 22.3125L12.6094 21.4219C12.6094 21.4219 14.1387 19.2334 15.6562 16.6172C16.415 15.3105 17.1621 13.9072 17.7422 12.5859C18.3223 11.2646 18.75 10.0547 18.75 9C18.75 5.28223 15.7178 2.25 12 2.25ZM12 3.75C14.9092 3.75 17.25 6.09082 17.25 9C17.25 9.60059 16.9277 10.7373 16.3828 11.9766C15.8379 13.2158 15.085 14.5898 14.3438 15.8672C13.166 17.9004 12.4336 18.9756 12 19.6172C11.5664 18.9756 10.834 17.9004 9.65625 15.8672C8.91504 14.5898 8.16211 13.2158 7.61719 11.9766C7.07227 10.7373 6.75 9.60059 6.75 9C6.75 6.09082 9.09082 3.75 12 3.75ZM12 7.5C11.1709 7.5 10.5 8.1709 10.5 9C10.5 9.8291 11.1709 10.5 12 10.5C12.8291 10.5 13.5 9.8291 13.5 9C13.5 8.1709 12.8291 7.5 12 7.5Z"
                        fill="white"/>
                  </svg>
                </span> <?= $settings['address']; ?></a></li>
                </ul>
            </div>
        </div>
    </div>
    <hr>
    <div class="social-link-container d-flex justify-content-center align-items-center">
        <div class="social-links">
            <a href="<?= $settings['fb_url']; ?>" target="_blank" class="text-light text-decoration-none"
               aria-label="facebook page link">
                <svg
                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path
                        d="M11.7231 9L12.1675 6.10437H9.38908V4.22531C9.38908 3.43313 9.77721 2.66094 11.0216 2.66094H12.2847V0.195625C12.2847 0.195625 11.1385 0 10.0425 0C7.75439 0 6.25877 1.38688 6.25877 3.8975V6.10437H3.71533V9H6.25877V16H9.38908V9H11.7231Z"
                        fill="white"/>
                </svg>
            </a>
            <a href="<?php echo $settings['instagram_url']; ?>" target="_blank" class="text-light text-decoration-none"
               aria-label="Instagram accoutn link">
                <svg
                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path
                        d="M8.00315 4.40635C6.01565 4.40635 4.41252 6.00947 4.41252 7.99697C4.41252 9.98447 6.01565 11.5876 8.00315 11.5876C9.99065 11.5876 11.5938 9.98447 11.5938 7.99697C11.5938 6.00947 9.99065 4.40635 8.00315 4.40635ZM8.00315 10.3313C6.71877 10.3313 5.66877 9.28447 5.66877 7.99697C5.66877 6.70947 6.71565 5.6626 8.00315 5.6626C9.29065 5.6626 10.3375 6.70947 10.3375 7.99697C10.3375 9.28447 9.28752 10.3313 8.00315 10.3313ZM12.5781 4.25947C12.5781 4.7251 12.2031 5.09697 11.7407 5.09697C11.275 5.09697 10.9031 4.72197 10.9031 4.25947C10.9031 3.79697 11.2782 3.42197 11.7407 3.42197C12.2031 3.42197 12.5781 3.79697 12.5781 4.25947ZM14.9563 5.10947C14.9031 3.9876 14.6469 2.99385 13.825 2.1751C13.0063 1.35635 12.0125 1.1001 10.8906 1.04385C9.7344 0.978223 6.26877 0.978223 5.11252 1.04385C3.99377 1.09697 3.00002 1.35322 2.17815 2.17197C1.35627 2.99072 1.10315 3.98447 1.0469 5.10635C0.981274 6.2626 0.981274 9.72822 1.0469 10.8845C1.10002 12.0063 1.35627 13.0001 2.17815 13.8188C3.00002 14.6376 3.99065 14.8938 5.11252 14.9501C6.26877 15.0157 9.7344 15.0157 10.8906 14.9501C12.0125 14.897 13.0063 14.6407 13.825 13.8188C14.6438 13.0001 14.9 12.0063 14.9563 10.8845C15.0219 9.72822 15.0219 6.26572 14.9563 5.10947ZM13.4625 12.1251C13.2188 12.7376 12.7469 13.2095 12.1313 13.4563C11.2094 13.822 9.0219 13.7376 8.00315 13.7376C6.9844 13.7376 4.79377 13.8188 3.87502 13.4563C3.26252 13.2126 2.79065 12.7407 2.54377 12.1251C2.17815 11.2032 2.26252 9.01572 2.26252 7.99697C2.26252 6.97822 2.18127 4.7876 2.54377 3.86885C2.78752 3.25635 3.2594 2.78447 3.87502 2.5376C4.7969 2.17197 6.9844 2.25635 8.00315 2.25635C9.0219 2.25635 11.2125 2.1751 12.1313 2.5376C12.7438 2.78135 13.2156 3.25322 13.4625 3.86885C13.8281 4.79072 13.7438 6.97822 13.7438 7.99697C13.7438 9.01572 13.8281 11.2063 13.4625 12.1251Z"
                        fill="white"/>
                </svg>
            </a>
            <a href="<?= $settings['twitter_url']; ?>" target="_blank" class="text-light text-decoration-none"
               aria-label="twitter profile link">
                <svg
                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path
                        d="M14.3553 4.741C14.3655 4.88313 14.3655 5.02529 14.3655 5.16741C14.3655 9.50241 11.066 14.4973 5.03553 14.4973C3.17766 14.4973 1.45178 13.9593 0 13.0253C0.263969 13.0557 0.51775 13.0659 0.791875 13.0659C2.32484 13.0659 3.73603 12.5481 4.86294 11.6649C3.42131 11.6344 2.21319 10.6903 1.79694 9.39075C2 9.42119 2.20303 9.4415 2.41625 9.4415C2.71066 9.4415 3.00509 9.40088 3.27919 9.32985C1.77666 9.02525 0.649719 7.70547 0.649719 6.11157V6.07097C1.08625 6.31463 1.59391 6.46691 2.13194 6.48719C1.24869 5.89835 0.670031 4.89329 0.670031 3.75622C0.670031 3.1471 0.832437 2.58872 1.11672 2.10141C2.73094 4.09125 5.15734 5.39072 7.87812 5.53288C7.82737 5.28922 7.79691 5.03544 7.79691 4.78163C7.79691 2.9745 9.25884 1.50244 11.0761 1.50244C12.0202 1.50244 12.873 1.89838 13.472 2.53797C14.2131 2.39585 14.9238 2.12172 15.5532 1.7461C15.3096 2.50754 14.7918 3.14713 14.1116 3.55319C14.7715 3.48216 15.4111 3.29938 15.9999 3.0456C15.5533 3.69532 14.9949 4.27397 14.3553 4.741Z"
                        fill="white"/>
                </svg>
            </a>
            <a href="#" target="_blank" class="text-light text-decoration-none" aria-label="linkedin account link">
                <svg
                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path
                        d="M4.13375 14.0002H1.23125V4.6533H4.13375V14.0002ZM2.68094 3.3783C1.75281 3.3783 1 2.60955 1 1.68143C1 1.23561 1.1771 0.80806 1.49234 0.492823C1.80757 0.177587 2.23513 0.000488281 2.68094 0.000488281C3.12675 0.000488281 3.5543 0.177587 3.86954 0.492823C4.18478 0.80806 4.36188 1.23561 4.36188 1.68143C4.36188 2.60955 3.60875 3.3783 2.68094 3.3783ZM14.9969 14.0002H12.1006V9.45018C12.1006 8.3658 12.0787 6.97518 10.5916 6.97518C9.0825 6.97518 8.85125 8.1533 8.85125 9.37205V14.0002H5.95188V4.6533H8.73562V5.9283H8.77625C9.16375 5.19393 10.1103 4.41893 11.5225 4.41893C14.46 4.41893 15 6.3533 15 8.8658V14.0002H14.9969Z"
                        fill="white"/>
                </svg>
            </a>
        </div>
    </div>
    <div class="footer-contact text-center">
        <!--        <a href="https://www.dnationsoft.com/" target="_blank" class="text-decoration-none ">-->
        <span>Copyright © <?php echo $settings['store_name']; ?> <?php echo date('Y'); ?> | All Rights Reserved</span>
        <!--        </a>-->
    </div>

</footer>

<!-- Swiper JS -->


<script src="<?php echo base_url() ?>/assets/theme_4/bootstrap/bootstrap.bundle.min.js" defer></script>
<script src="<?php echo base_url() ?>/assets/theme_4/swiper-js/swiper-bundle.min.js" defer></script>
<script src="<?php echo base_url() ?>/assets/theme_4/jquery-3.6.1.min.js" ></script>
<script src="<?php echo base_url() ?>/assets/theme_4/js/main.js" defer></script>

<!--start -- used in home details and category page-->
<script src="<?php echo base_url() ?>/assets/theme_4/js/nav.js" defer></script>
<!--end -- used in home details and category page-->
<script>
    //start -- used in home details and category page
    window.addEventListener('DOMContentLoaded', function () {
        const buttons = document.querySelectorAll('.compare,.favorite');

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                button.classList.toggle('marked');
            });
        });
    });

    //end -- used in home details and category page

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('label.required').forEach(label => {
            // Avoid duplicate asterisks
            if (!label.querySelector('.required-star')) {
                const star = document.createElement('span');
                star.textContent = '*';
                star.className = 'required-star';
                star.style.color = 'red';
                label.appendChild(star);
            }
        });
    });

    //Add To Compare
    function addToCompare(pro_id) {
        let csrfName = $('meta[name="csrf-name"]').attr('content');
        let csrfHash = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('addtoCompare') ?>",
            data: {
                [csrfName]: csrfHash,
                product_id: pro_id
            },
            success: function(response) {
                $('#mesVal').html(response);
                $('.message_alert').show();
                $('#comparetReload').load(location.href + " #comparetReload");
                setTimeout(function() {
                    $("#messAlt").fadeOut(1500);
                }, 600);
            }
        });
    }
    //Remove To Compare
    function removeToCompare(key_id) {
        let csrfName = $('meta[name="csrf-name"]').attr('content');
        let csrfHash = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('removeToCompare') ?>",
            data: {
                [csrfName]: csrfHash,
                key_id: key_id
            },
            success: function(response) {
                $('#compReload').load(location.href + " #compReload");
                $('#comparetReload').load(location.href + " #comparetReload");
                $('#mesVal').html(response);
                $('.message_alert').show();
                setTimeout(function() {
                    $("#messAlt").fadeOut(1500);
                }, 600);
            }
        });
    }

    //Add To Wishlist
    function addToWishlist(pro_id) {
        let csrfName = $('meta[name="csrf-name"]').attr('content');
        let csrfHash = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('addtoWishlist') ?>",
            data: {
                [csrfName]: csrfHash,
                product_id: pro_id
            },
            success: function(response) {
                $('#mesVal').html(response);
                $('.message_alert').show();
                setTimeout(function() {
                    $("#messAlt").fadeOut(1500);
                }, 600);
            }
        });
    }
    //Remove To Wishlist
    function removeToWishlist(proId) {
        let csrfName = $('meta[name="csrf-name"]').attr('content');
        let csrfHash = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('removeToWishlist') ?>",
            data: {
                [csrfName]: csrfHash,
                product_id: proId
            },
            success: function(response) {
                $('#reloadDiv').load(location.href + " #reloadDiv");
                $('#mesVal').html(response);
                $('.message_alert').show();
                setTimeout(function() {
                    $("#messAlt").fadeOut(1500);
                }, 600);
            }
        });
    }

    //Add To Cart
    function addToCart(pro_id) {
        let csrfName = $('meta[name="csrf-name"]').attr('content');
        let csrfHash = $('meta[name="csrf-token"]').attr('content');

        var size = $("input[name='size']:checked").val();
        var color = $("input[name='color']:checked").val();

        $.ajax({
            method: "POST",
            url: "<?php echo base_url('checkoption') ?>",
            data: {
                [csrfName]: csrfHash,
                product_id: pro_id
            },
            success: function(response,status, xhr) {
                let newToken = xhr.getResponseHeader("X-CSRF-TOKEN");
                if (newToken) {
                    $('meta[name="csrf-token"]').attr("content", newToken);
                }
                if (response == 'true') {
                    adtocartAction(pro_id);
                } else {
                    if (size == null || color == null) {
                        $('.mes-1').html('Required field');
                        $('.mes-2').html('Required field');
                    } else {
                        $('.mes-1').html('');
                        $('.mes-2').html('');
                        adtocartAction(pro_id);
                    }
                }
            }
        });
    }
    //Cart Action
    function adtocartAction(pro_id) {
        let csrfName = $('meta[name="csrf-name"]').attr('content');
        let csrfHash = $('meta[name="csrf-token"]').attr('content');

        var qty = $('#qty_input').val();
        if (qty == null) {
            qty = '1';
        }
        var size = $("input[name='size']:checked").val();
        if (size == null) {
            size = '';
        }
        var color = $("input[name='color']:checked").val();
        if (color == null) {
            color = '';
        }
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('addtocart') ?>",
            data: {
                [csrfName]: csrfHash,
                product_id: pro_id,
                qtyall: qty,
                size: size,
                color: color
            },
            success: function(response,status, xhr) {
                let newToken = xhr.getResponseHeader("X-CSRF-TOKEN");
                if (newToken) {
                    $('meta[name="csrf-token"]').attr("content", newToken);
                }
                $('#cartReload').load(location.href + " #cartReload");
                $('#cartReload2').load(location.href + " #cartReload2");
                $('#mesVal').html(response);
                $('.btn-count').load(location.href + " .btn-count");
                $('.body-count').load(location.href + " .body-count");
                $('#carticon2').css('transform', 'rotate(90deg)');
                $('#collapseExample').addClass('show');
                $('.message_alert').show();
                setTimeout(function() {
                    $("#messAlt").fadeOut(1500);
                }, 600);
            }
        });
    }
    //Add To Cart Detail
    function addToCartdetail() {
        $("#addto-cart-form").on('submit', (function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            // ADD CSRF TOKEN (important for CI4)
            formData.append(
                $('meta[name="csrf-name"]').attr("content"),
                $('meta[name="csrf-token"]').attr("content")
            );
            $.ajax({
                url: $(this).attr('action'),
                type: "POST",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function(response,status, xhr) {
                    let newToken = xhr.getResponseHeader("X-CSRF-TOKEN");
                    if (newToken) {
                        $('meta[name="csrf-token"]').attr("content", newToken);
                    }
                    $('#cartReload').load(location.href + " #cartReload");
                    $('#cartReload2').load(location.href + " #cartReload2");
                    $('#mesVal').html(response);
                    $('.btn-count').load(location.href + " .btn-count");
                    $('.body-count').load(location.href + " .body-count");
                    $('#carticon2').css('transform', 'rotate(90deg)');
                    $('#collapseExample').addClass('show');

                    $('.message_alert').show();
                    setTimeout(function() {
                        $("#messAlt").fadeOut(1500);
                    }, 600);

                }
            });
        }));
    }

    //Check Option
    function checkoption(pro_id) {
        let csrfName = $('meta[name="csrf-name"]').attr('content');
        let csrfHash = $('meta[name="csrf-token"]').attr('content');
        var result;
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('checkoption') ?>",
            data: {
                [csrfName]: csrfHash,
                product_id: pro_id
            },
            success: function(response) {
                result = response;
            }
        });
        return result;
    }

    //Plus Minus Item
    function minusItem(rowid) {
        var quantity = parseInt($('.item_' + rowid).val());
        if (quantity > 1) {
            $('.item_' + rowid).val(quantity - 1);
        }
        $('#btn_' + rowid).show();
    }
    function plusItem(rowid) {
        var quantity = parseInt($('.item_' + rowid).val());
        $('.item_' + rowid).val(quantity + 1);
        $('#btn_' + rowid).show();

    }

    //Update qty
    function updateQty(rowid) {
        let csrfName = $('meta[name="csrf-name"]').attr('content');
        let csrfHash = $('meta[name="csrf-token"]').attr('content');
        var qty = $('.item_' + rowid).val();
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('updateToCart') ?>",
            data: {
                [csrfName]: csrfHash,
                rowid: rowid,
                qty: qty
            },
            dataType: 'json',
            success: function(response) {
                $('meta[name="csrf-token"]').attr('content', response.csrfToken);
                $('input[name="<?= csrf_token() ?>"]').val(response.csrfToken);

                $('#cartReload').load(location.href + " #cartReload");
                $('#tableReload').load(location.href + " #tableReload");
                $('#tableReload2').load(location.href + " #tableReload2");
                $('#cartReload2').load(location.href + " #cartReload2");
                $('#mesVal').html(response.message);
                $('.btn-count').load(location.href + " .btn-count");
                $('.body-count').load(location.href + " .body-count");
                $('#collapseExample').addClass('show');
                $('.message_alert').show();
                setTimeout(function() {
                    $("#messAlt").fadeOut(1500);
                }, 600);
                $('#btn_' + rowid).hide();
                // checkout_data_calculate(response.cartTotal);
                shippingCharge(response.cartTotal);
            }
        });
    }
    //Remove Cart
    function removeCart(rowid,div) {
        let csrfName = $('meta[name="csrf-name"]').attr('content');
        let csrfHash = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('removeToCart') ?>",
            data: {
                [csrfName]: csrfHash,
                rowid: rowid
            },
            success: function(response,status, xhr) {
                let newToken = xhr.getResponseHeader("X-CSRF-TOKEN");
                if (newToken) {
                    $('meta[name="csrf-token"]').attr("content", newToken);
                    $('input[name="<?= csrf_token() ?>"]').val(newToken);
                }
                $('#cartReload').load(location.href + " #cartReload");
                $('#cartReload2').load(location.href + " #cartReload2");
                $('#tableReload').load(location.href + " #tableReload");
                $('#tableReload2').load(location.href + " #tableReload2");
                $('#mesVal').html('Successfully remove to cart');
                $('.btn-count').load(location.href + " .btn-count");
                $('.body-count').load(location.href + " .body-count");
                $('#collapseExample').addClass('show');
                $('.message_alert').show();
                setTimeout(function() {
                    $("#messAlt").fadeOut(1500);
                }, 600);
                // checkout_data_calculate(response);
                shippingCharge(response);
                $(div).parent().parent().remove();

                $.ajax({
                    method: "GET",
                    url: "<?php echo base_url('cart_empty_check') ?>",
                    data: {},
                    success: function(result) {
                        if (result == false){
                            location.reload();
                        }
                    }
                });
            }
        });
    }

    function subscribe() {
        var email = $('#subscribe_email').val();
        if (email == '') {
            $('#mesVal').html('Email required');
            $('.message_alert').show();
            setTimeout(function() {
                $("#messAlt").fadeOut(1500);
            }, 600);
        } else {
            let csrfName = $('meta[name="csrf-name"]').attr('content');
            let csrfHash = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                method: "POST",
                url: "<?php echo base_url('user_subscribe') ?>",
                data: {
                    [csrfName]: csrfHash,
                    email: email
                },
                success: function(response) {
                    $('#subscribe_email').val('');
                    $('#mesVal').html(response);
                    $('.message_alert').show();
                    setTimeout(function() {
                        $("#messAlt").fadeOut(1500);
                    }, 600);
                }
            });
        }
    }

    $(document).ajaxComplete(function(event, xhr) {
        let headerName = $('meta[name="csrf-header"]').attr('content');
        let newToken   = xhr.getResponseHeader(headerName);
        if (newToken) {
            $('meta[name="csrf-token"]').attr('content', newToken);
            $('input[name="<?= csrf_token() ?>"]').val(newToken);
        }
    });

    //Scroll To Top Btn
    const scrollToTopBtn = document.getElementById("scrollToTopBtn");
    window.onscroll = function () {
        if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
            scrollToTopBtn.classList.add("show");
        } else {
            scrollToTopBtn.classList.remove("show");
        }
    };

    scrollToTopBtn.addEventListener("click", function () {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });

</script>

<?= $this->renderSection('java_script') ?>
</body>

</html>
