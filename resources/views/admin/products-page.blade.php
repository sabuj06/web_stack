<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Products Page | TrueNorth Admin</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="admin-header">
        <h1>TrueNorth Admin</h1>
        <nav class="admin-nav">
            <a href="{{ route('admin.dashboard') }}">Contacts</a>
            <a href="{{ route('admin.products') }}">Products</a>
            <a href="{{ route('admin.about') }}">About</a>
            <a href="{{ route('admin.productspage') }}">Products Page</a>
            <a href="{{ route('home') }}" target="_blank">View Site</a>
        </nav>
    </div>

    <div class="admin-body">
        <div class="form-card">
            <h2>Edit Products Page</h2>
            <div id="ajax-message" style="display:none; padding:12px 16px; border-radius:6px; margin-bottom:16px;"></div>

            <form id="edit-productspage-form">
                @csrf

                <p class="section-title">Hero Section</p>
                <div class="form-group">
                    <label>Hero Label</label>
                    <input type="text" name="hero_label" value="{{ old('hero_label', $productsPage->hero_label ?? '') }}" required>
                    <span class="error-text" id="error-hero_label"></span>
                </div>
                <div class="form-group">
                    <label>Hero Title</label>
                    <input type="text" name="hero_title" value="{{ old('hero_title', $productsPage->hero_title ?? '') }}" required>
                    <span class="error-text" id="error-hero_title"></span>
                </div>
                <div class="form-group">
                    <label>Hero Description</label>
                    <textarea name="hero_description" rows="3" required>{{ old('hero_description', $productsPage->hero_description ?? '') }}</textarea>
                    <span class="error-text" id="error-hero_description"></span>
                </div>

                <p class="section-title">Products Section</p>
                <div class="form-group">
                    <label>Section Title</label>
                    <input type="text" name="section_title" value="{{ old('section_title', $productsPage->section_title ?? '') }}" required>
                    <span class="error-text" id="error-section_title"></span>
                </div>
                <div class="form-group">
                    <label>Section Subtitle</label>
                    <textarea name="section_subtitle" rows="3" required>{{ old('section_subtitle', $productsPage->section_subtitle ?? '') }}</textarea>
                    <span class="error-text" id="error-section_subtitle"></span>
                </div>

                <button type="submit" class="btn-save" id="submit-btn">Save Changes</button>
            </form>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $('#edit-productspage-form').on('submit', function (e) {
        e.preventDefault();
        $('.error-text').text('');
        const msgBox = $('#ajax-message');
        msgBox.hide();
        const btn = $('#submit-btn');
        btn.text('Saving...').prop('disabled', true);

        $.ajax({
            url: '{{ route('admin.productspage.update') }}',
            method: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').first().val(),
                'Accept': 'application/json'
            },
            success: function (data) {
                btn.text('Save Changes').prop('disabled', false);
                msgBox.text(data.message || 'Updated!')
                    .css({ background: '#d4edda', color: '#155724', border: '1px solid #c3e6cb' })
                    .show();
            },
            error: function (xhr) {
                btn.text('Save Changes').prop('disabled', false);
                const errors = xhr.responseJSON?.errors;
                if (errors) {
                    $.each(errors, (field, messages) => $('#error-' + field).text(messages[0]));
                    msgBox.text('Please fix the errors above.')
                        .css({ background: '#f8d7da', color: '#721c24', border: '1px solid #f5c6cb' })
                        .show();
                } else {
                    msgBox.text('Something went wrong.')
                        .css({ background: '#f8d7da', color: '#721c24', border: '1px solid #f5c6cb' })
                        .show();
                }
            }
        });
    });
</script>
</body>
</html>