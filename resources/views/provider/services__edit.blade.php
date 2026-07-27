@extends('layouts.provider')

@section('content')
<div class="svc-form-wrap">
    <div class="svc-form-card">
        <h1 class="svc-title">Edit Service</h1> <br>

        <form class="svc-form" method="POST" action="{{ route('provider.services.update', $service->id) }}" enctype="multipart/form-data">
            @csrf

            <div class="svc-field svc-field--full">
                <label for="svc-title">Service Title</label>
                <input type="text" id="svc-title" name="title" placeholder="e.g. Deep House Cleaning" value="{{ $service->title }}" required>
                @error('title')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div class="svc-row">
                <div class="svc-field">
                    <label for="svc-category">Category</label>
                    <div class="svc-select-wrap">
                        <select id="svc-category" name="category_id" required>                        
                                <option value="{{ $service->category->id }}" selected>{{ $service->category->name }}</option>
                                @foreach ($categoreis as $category)
                                @if($category->name == $service->category->name)
                                @continue
                                @endif
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                        </select>
                    </div>
                @error('category_id')
                    <span>{{ $message }}</span>
                @enderror
                </div>

                <div class="svc-field">
                    <label for="svc-price">Price</label>
                    <div class="svc-price-wrap">
                        <input type="number" id="svc-price" name="price" placeholder="0.00" min="0" step="0.01" value="{{ $service->price }}" required>
                @error('price')
                    <span>{{ $message }}</span>
                @enderror
                    </div>
                </div>
            </div>

            <div class="svc-field svc-field--full">
                <label for="svc-description">Description</label>
                <textarea id="svc-description" name="description" rows="4" placeholder="What's included, how long it takes...">{{ $service->description }}</textarea>
                @error('description')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div class="svc-field svc-field--full">
                <label for="svc-image">Photo</label>
                <span>Current</span>
                <img src="{{ asset('storage/images/service/'. $service->image) }}" class="current_img" alt="current image">
                <div class="svc-file">
                    <span class="svc-file-btn" aria-hidden="true">Choose File</span>
                    <span class="svc-file-name" id="svc-file-name">No file chosen</span>
                    <input type="file" id="svc-image" name="image" accept="image/*" class="svc-file-input"
                        aria-label="Photo"
                        onchange="document.getElementById('svc-file-name').textContent = this.files.length ? this.files[0].name : 'No file chosen';">
                </div>
               @error('image')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="svc-submit">Update Service</button>
        </form>
    </div>
</div>
@endsection

@push('style')
    <style>
    /* .current_img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    } */
    .svc-form-wrap {
        --black: #000000;
        --white: #ffffff;
        --gray-1: #f5f5f5;
        --gray-2: #e0e0e0;
        --gray-3: #999999;


      
        background: var(--white);
        color: var(--black);
        padding: 24px 16px;
        display: flex;
        justify-content: center;
        box-sizing: border-box;
    }
    .svc-form-wrap *, .svc-form-wrap *::before, .svc-form-wrap *::after {
        box-sizing: border-box;
    }

    .svc-form-card {
        width: 100%;
        max-width: 560px;
        background: var(--white);
        border: 1px solid var(--black);
        border-radius: 4px;
        padding: 32px 28px;
    }

    .svc-title {
        margin: 0 0 6px;
        font-size: 26px;
        font-weight: 700;
        letter-spacing: -0.02em;
        color: var(--black);
    }
    .svc-subtitle {
        margin: 0 0 28px;
        font-size: 14px;
        color: var(--gray-3);
    }

    .svc-form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .svc-row {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .svc-field {
        display: flex;
        flex-direction: column;
        gap: 8px;
        flex: 1 1 0;
    }

    .svc-field label {
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        color: var(--black);
    }

    /* Shared input styling */
    .svc-form input[type="text"],
    .svc-form input[type="number"],
    .svc-form select,
    .svc-form textarea {
        width: 100%;
        font-family: var(--font);
        font-size: 15px;
        color: var(--black);
        background: var(--white);
        border: 1.5px solid var(--black);
        border-radius: 4px;
        padding: 12px 14px;
        min-height: 46px;
        transition: background 150ms ease, box-shadow 150ms ease;
        appearance: none;
        -webkit-appearance: none;
    }

    .svc-form textarea {
        min-height: 110px;
        resize: vertical;
        line-height: 1.5;
    }

    .svc-form input::placeholder,
    .svc-form textarea::placeholder {
        color: var(--gray-3);
    }

    /* Hover */
    .svc-form input:hover,
    .svc-form select:hover,
    .svc-form textarea:hover {
        background: var(--gray-1);
    }

    /* Focus */
    .svc-form input:focus,
    .svc-form select:focus,
    .svc-form textarea:focus {
        outline: none;
        background: var(--white);
        box-shadow: 0 0 0 3px var(--black);
    }

    /* Kill browser autofill color tint (Chrome/Safari force a yellow or
       pink background on autofilled fields unless overridden) */
    .svc-form input:-webkit-autofill,
    .svc-form input:-webkit-autofill:hover,
    .svc-form input:-webkit-autofill:focus {
        -webkit-text-fill-color: var(--black);
        -webkit-box-shadow: 0 0 0 1000px var(--white) inset;
        box-shadow: 0 0 0 1000px var(--white) inset;
        transition: background-color 9999s ease-in-out 0s;
        caret-color: var(--black);
    }

    /* Disabled */
    .svc-form input:disabled,
    .svc-form select:disabled,
    .svc-form textarea:disabled {
        background: var(--gray-1);
        color: var(--gray-3);
        border-color: var(--gray-2);
        cursor: not-allowed;
    }

    /* Select chevron (pure CSS, no image) */
    .svc-select-wrap {
        position: relative;
    }
    .svc-select-wrap::after {
        content: "";
        position: absolute;
        right: 16px;
        top: 50%;
        width: 8px;
        height: 8px;
        border-right: 1.5px solid var(--black);
        border-bottom: 1.5px solid var(--black);
        transform: translateY(-70%) rotate(45deg);
        pointer-events: none;
    }
    .svc-select-wrap select {
        padding-right: 40px;
        cursor: pointer;
    }

    /* Price prefix */
    .svc-price-wrap {
        position: relative;
    }
    .svc-price-prefix {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--black);
        font-size: 15px;
        font-weight: 600;
        pointer-events: none;
        z-index: 1;
    }
    .svc-price-wrap input {
        padding-left: 30px;
    }
    /* Remove native step arrows so nothing crowds the $ prefix or shifts the box */
    .svc-price-wrap input[type="number"]::-webkit-outer-spin-button,
    .svc-price-wrap input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    .svc-price-wrap input[type="number"] {
        -moz-appearance: textfield;
    }


    .svc-file {
        position: relative;
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
        border: 1.5px dashed var(--black);
        border-radius: 4px;
        padding: 10px;
        background: var(--white);
        overflow: hidden;
    }
    .svc-file-input {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        border: 0;
        opacity: 0;
        cursor: pointer;
        z-index: 2;
    }
    .svc-file-btn {
        position: relative;
        z-index: 1;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        color: var(--white);
        background: var(--black);
        border-radius: 4px;
        padding: 10px 16px;
        min-height: 38px;
        pointer-events: none;
        transition: opacity 150ms ease;
    }
    .svc-file:hover .svc-file-btn {
        opacity: 0.8;
    }
    .svc-file-input:focus-visible ~ .svc-file-btn {
        box-shadow: 0 0 0 3px var(--gray-3);
    }
    .svc-file-name {
        position: relative;
        z-index: 1;
        font-size: 13px;
        color: var(--gray-3);
        pointer-events: none;
    }

    /* Submit */
    .svc-submit {
        margin-top: 8px;
        width: 100%;
        font-family: var(--font);
        font-size: 15px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: var(--white);
        background: var(--black);
        border: 1.5px solid var(--black);
        border-radius: 4px;
        padding: 14px 20px;
        min-height: 48px;
        cursor: pointer;
        transition: background 150ms ease, color 150ms ease, transform 100ms ease;
    }
    .svc-submit:hover {
        background: var(--white);
        color: var(--black);
    }
    .svc-submit:focus-visible {
        outline: none;
        box-shadow: 0 0 0 3px var(--gray-3);
    }
    .svc-submit:active {
        transform: scale(0.98);
    }

    /* ---- Tablet and up ---- */
    @media (min-width: 640px) {
        .svc-row {
            flex-direction: row;
        }
        .svc-form-card {
            padding: 40px 36px;
        }
    }

    /* ---- Desktop ---- */
    @media (min-width: 1024px) {
        .svc-form-wrap {
            padding: 48px 24px;
        }
        .svc-form-card {
            max-width: 620px;
            padding: 48px;
        }
        .svc-title {
            font-size: 30px;
        }
    }

    /* ---- Small mobile tightening ---- */
    @media (max-width: 380px) {
        .svc-form-card {
            padding: 24px 18px;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .svc-form-wrap * {
            transition: none !important;
        }
    }
</style>
@endpush