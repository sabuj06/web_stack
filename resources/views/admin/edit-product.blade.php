<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit About | TrueNorth Admin</title>
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
            <a href="{{ route('home') }}" target="_blank">View Site</a>
        </nav>
    </div>

    <div class="admin-body">

        {{-- About Page Form --}}
        <div class="form-card">
            <h2>Edit About Page</h2>
            <div id="ajax-message" style="display:none; padding:12px 16px; border-radius:6px; margin-bottom:16px;"></div>

            <form id="edit-about-form">
                @csrf

                <p class="section-title">Hero Section</p>
                <div class="form-group">
                    <label>Hero Title</label>
                    <input type="text" name="hero_title" value="{{ old('hero_title', $about->hero_title ?? '') }}" required>
                    <span class="error-text" id="error-hero_title"></span>
                </div>
                <div class="form-group">
                    <label>Hero Description</label>
                    <textarea name="hero_description" rows="3" required>{{ old('hero_description', $about->hero_description ?? '') }}</textarea>
                    <span class="error-text" id="error-hero_description"></span>
                </div>

                <p class="section-title">About Section</p>
                <div class="form-group">
                    <label>About Text</label>
                    <textarea name="about_text" rows="4" required>{{ old('about_text', $about->about_text ?? '') }}</textarea>
                    <span class="error-text" id="error-about_text"></span>
                </div>
                <div class="form-group">
                    <label>About Image</label>
                    <input type="file" name="about_image" id="about-image-input" accept="image/*" style="display:none;">
                    <div id="about-image-box" style="border:2px dashed #ccc; border-radius:8px; padding:28px; text-align:center; cursor:pointer;">
                        @if($about && $about->about_image)
                            <img id="about-image-preview" src="{{ asset($about->about_image) }}" alt="About Image" style="max-height:80px; border-radius:6px; margin-bottom:10px;">
                        @else
                            <img id="about-image-preview" src="" alt="" style="display:none; max-height:80px; border-radius:6px; margin-bottom:10px;">
                            <div id="about-image-placeholder">
                                <p style="margin:0; color:#888; font-size:14px;">Click to select an image</p>
                                <span style="font-size:12px; color:#bbb;">JPG, PNG, WEBP — max 2MB</span>
                            </div>
                        @endif
                    </div>
                    <p style="font-size:12px; color:#aaa; margin-top:6px;">Leave empty to keep current image</p>
                    <span class="error-text" id="error-about_image"></span>
                </div>
                <div class="form-group">
                    <label>Footprint Regions</label>
                    <input type="text" name="footprint_regions" value="{{ old('footprint_regions', $about->footprint_regions ?? '') }}">
                    <span class="error-text" id="error-footprint_regions"></span>
                </div>

                <p class="section-title">Solutions Section</p>
                <div class="form-group">
                    <label>Solutions Text</label>
                    <textarea name="solutions_text" rows="3">{{ old('solutions_text', $about->solutions_text ?? '') }}</textarea>
                    <span class="error-text" id="error-solutions_text"></span>
                </div>

                <p class="section-title">Vision Section</p>
                <div class="form-group">
                    <label>Vision Text</label>
                    <textarea name="vision_text" rows="4">{{ old('vision_text', $about->vision_text ?? '') }}</textarea>
                    <span class="error-text" id="error-vision_text"></span>
                </div>
                <div class="form-group">
                    <label>Vision Image</label>
                    <input type="file" name="vision_image" id="vision-image-input" accept="image/*" style="display:none;">
                    <div id="vision-image-box" style="border:2px dashed #ccc; border-radius:8px; padding:28px; text-align:center; cursor:pointer;">
                        @if($about && $about->vision_image)
                            <img id="vision-image-preview" src="{{ asset($about->vision_image) }}" alt="Vision Image" style="max-height:80px; border-radius:6px; margin-bottom:10px;">
                        @else
                            <img id="vision-image-preview" src="" alt="" style="display:none; max-height:80px; border-radius:6px; margin-bottom:10px;">
                            <div id="vision-image-placeholder">
                                <p style="margin:0; color:#888; font-size:14px;">Click to select an image</p>
                                <span style="font-size:12px; color:#bbb;">JPG, PNG, WEBP — max 2MB</span>
                            </div>
                        @endif
                    </div>
                    <p style="font-size:12px; color:#aaa; margin-top:6px;">Leave empty to keep current image</p>
                    <span class="error-text" id="error-vision_image"></span>
                </div>

                <p class="section-title">Vision Tags</p>
                <div class="form-group">
                    <label>Vision Tag 1</label>
                    <input type="text" name="vision_tag_1" value="{{ old('vision_tag_1', $about->vision_tag_1 ?? 'PRECISION') }}">
                </div>
                <div class="form-group">
                    <label>Vision Tag 2</label>
                    <input type="text" name="vision_tag_2" value="{{ old('vision_tag_2', $about->vision_tag_2 ?? 'AUTHORITY') }}">
                </div>
                <div class="form-group">
                    <label>Vision Tag 3</label>
                    <input type="text" name="vision_tag_3" value="{{ old('vision_tag_3', $about->vision_tag_3 ?? 'LONGEVITY') }}">
                </div>

                <p class="section-title">Commitment Section</p>
                <div class="form-group">
                    <label>Core Mission Label</label>
                    <input type="text" name="core_mission_label" value="{{ old('core_mission_label', $about->core_mission_label ?? 'THE CORE MISSION') }}">
                </div>
                <div class="form-group">
                    <label>Commitment Title</label>
                    <input type="text" name="commitment_title" value="{{ old('commitment_title', $about->commitment_title ?? '') }}">
                    <span class="error-text" id="error-commitment_title"></span>
                </div>
                <div class="form-group">
                    <label>Commitment Text</label>
                    <textarea name="commitment_text" rows="3">{{ old('commitment_text', $about->commitment_text ?? '') }}</textarea>
                    <span class="error-text" id="error-commitment_text"></span>
                </div>

                <p class="section-title">Core Values Section</p>
                <div class="form-group">
                    <label>Core Values Subtitle</label>
                    <input type="text" name="core_values_subtitle" value="{{ old('core_values_subtitle', $about->core_values_subtitle ?? '') }}">
                </div>

                <button type="submit" class="btn-save" id="about-submit-btn">Save Changes</button>
            </form>
        </div>

        {{-- Core Values --}}
        <div class="form-card" style="margin-top:32px;">
            <div class="section-header">
                <p class="section-title">Core Values</p>
                <button class="btn-add" id="show-add-value-btn">+ Add Value</button>
            </div>

            {{-- Add Core Value Form --}}
            <div id="add-value-form-wrapper" style="display:none; margin-bottom:24px; border:1px solid #eee; border-radius:8px; padding:20px;">
                <h3 style="margin-bottom:16px;">Add New Core Value</h3>
                <div id="add-value-message" style="display:none; padding:12px 16px; border-radius:6px; margin-bottom:16px;"></div>
                <form id="add-value-form">
                    @csrf
                    <div class="form-group">
                        <label>Icon Class (FontAwesome)</label>
                        <input type="text" name="icon" placeholder="e.g. fas fa-certificate">
                        <span class="error-text" id="add-error-icon"></span>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title">
                        <span class="error-text" id="add-error-title"></span>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" rows="3"></textarea>
                        <span class="error-text" id="add-error-description"></span>
                    </div>
                    <div class="form-group">
                        <label>Card Type</label>
                        <select name="card_type">
                            <option value="light">Light</option>
                            <option value="gold">Gold</option>
                            <option value="dark">Dark</option>
                        </select>
                        <span class="error-text" id="add-error-card_type"></span>
                    </div>
                    <div class="form-group">
                        <label>Sort Order</label>
                        <input type="number" name="sort_order" value="0">
                    </div>
                    <button type="submit" class="btn-save" id="add-value-btn">Add Value</button>
                </form>
            </div>

            {{-- Core Values Table --}}
            <table id="core-values-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Icon</th>
                        <th>Title</th>
                        <th>Card Type</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($coreValues as $value)
                    <tr id="value-row-{{ $value->id }}">
                        <td>{{ $value->sort_order }}</td>
                        <td><i class="{{ $value->icon }}"></i> {{ $value->icon }}</td>
                        <td>{{ $value->title }}</td>
                        <td>{{ $value->card_type }}</td>
                        <td>
                            <button class="btn-edit edit-value-btn"
                                data-id="{{ $value->id }}"
                                data-icon="{{ $value->icon }}"
                                data-title="{{ $value->title }}"
                                data-description="{{ $value->description }}"
                                data-card_type="{{ $value->card_type }}"
                                data-sort_order="{{ $value->sort_order }}">Edit</button>
                        </td>
                        <td>
                            <button class="btn-edit delete-value-btn" style="background:#e74c3c;"
                                data-id="{{ $value->id }}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Edit Core Value Modal --}}
        <div id="edit-value-modal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:999; justify-content:center; align-items:center;">
            <div style="background:#fff; border-radius:12px; padding:32px; width:100%; max-width:480px;">
                <h3 style="margin-bottom:16px;">Edit Core Value</h3>
                <div id="edit-value-message" style="display:none; padding:12px 16px; border-radius:6px; margin-bottom:16px;"></div>
                <form id="edit-value-form">
                    @csrf
                    <input type="hidden" name="value_id" id="edit-value-id">
                    <div class="form-group">
                        <label>Icon Class (FontAwesome)</label>
                        <input type="text" name="icon" id="edit-value-icon">
                        <span class="error-text" id="edit-error-icon"></span>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" id="edit-value-title">
                        <span class="error-text" id="edit-error-title"></span>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id="edit-value-description" rows="3"></textarea>
                        <span class="error-text" id="edit-error-description"></span>
                    </div>
                    <div class="form-group">
                        <label>Card Type</label>
                        <select name="card_type" id="edit-value-card_type">
                            <option value="light">Light</option>
                            <option value="gold">Gold</option>
                            <option value="dark">Dark</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Sort Order</label>
                        <input type="number" name="sort_order" id="edit-value-sort_order">
                    </div>
                    <div style="display:flex; gap:12px;">
                        <button type="submit" class="btn-save" id="edit-value-btn">Save Changes</button>
                        <button type="button" class="btn-save" id="close-modal-btn" style="background:#aaa;">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>

    // ── Image Preview: About ──
    $('#about-image-box').on('click', () => $('#about-image-input').click());
    $('#about-image-input').on('change', function () {
        if (this.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                $('#about-image-preview').attr('src', e.target.result).show();
                $('#about-image-placeholder').hide();
                $('#about-image-box').css('border-color', '#555');
            };
            reader.readAsDataURL(this.files[0]);
        }
    });

    // ── Image Preview: Vision ──
    $('#vision-image-box').on('click', () => $('#vision-image-input').click());
    $('#vision-image-input').on('change', function () {
        if (this.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                $('#vision-image-preview').attr('src', e.target.result).show();
                $('#vision-image-placeholder').hide();
                $('#vision-image-box').css('border-color', '#555');
            };
            reader.readAsDataURL(this.files[0]);
        }
    });

    // ── About Form AJAX ──
    $('#edit-about-form').on('submit', function (e) {
        e.preventDefault();
        $('.error-text').text('');
        const msgBox = $('#ajax-message');
        msgBox.hide();
        const btn = $('#about-submit-btn');
        btn.text('Saving...').prop('disabled', true);

        $.ajax({
            url: '{{ route('admin.about.update') }}',
            method: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').first().val(), 'Accept': 'application/json' },
            success: function (data) {
                btn.text('Save Changes').prop('disabled', false);
                msgBox.text(data.message || 'Updated!').css({ background: '#d4edda', color: '#155724', border: '1px solid #c3e6cb' }).show();
            },
            error: function (xhr) {
                btn.text('Save Changes').prop('disabled', false);
                const errors = xhr.responseJSON?.errors;
                if (errors) {
                    $.each(errors, (field, messages) => $('#error-' + field).text(messages[0]));
                    msgBox.text('Please fix the errors above.').css({ background: '#f8d7da', color: '#721c24', border: '1px solid #f5c6cb' }).show();
                } else {
                    msgBox.text('Something went wrong.').css({ background: '#f8d7da', color: '#721c24', border: '1px solid #f5c6cb' }).show();
                }
            }
        });
    });

    // ── Add Core Value ──
    $('#show-add-value-btn').on('click', function () {
        $('#add-value-form-wrapper').toggle();
    });

    $('#add-value-form').on('submit', function (e) {
        e.preventDefault();
        $('[id^="add-error-"]').text('');
        const msgBox = $('#add-value-message');
        msgBox.hide();
        const btn = $('#add-value-btn');
        btn.text('Saving...').prop('disabled', true);

        $.ajax({
            url: '{{ route('admin.corevalues.store') }}',
            method: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').first().val(), 'Accept': 'application/json' },
            success: function (data) {
                btn.text('Add Value').prop('disabled', false);
                msgBox.text(data.message || 'Added!').css({ background: '#d4edda', color: '#155724', border: '1px solid #c3e6cb' }).show();
                $('#add-value-form')[0].reset();
                setTimeout(() => location.reload(), 1000);
            },
            error: function (xhr) {
                btn.text('Add Value').prop('disabled', false);
                const errors = xhr.responseJSON?.errors;
                if (errors) {
                    $.each(errors, (field, messages) => $('#add-error-' + field).text(messages[0]));
                } else {
                    msgBox.text('Something went wrong.').css({ background: '#f8d7da', color: '#721c24', border: '1px solid #f5c6cb' }).show();
                }
            }
        });
    });

    // ── Edit Core Value Modal ──
    $(document).on('click', '.edit-value-btn', function () {
        const d = $(this).data();
        $('#edit-value-id').val(d.id);
        $('#edit-value-icon').val(d.icon);
        $('#edit-value-title').val(d.title);
        $('#edit-value-description').val(d.description);
        $('#edit-value-card_type').val(d.card_type);
        $('#edit-value-sort_order').val(d.sort_order);
        $('#edit-value-modal').css('display', 'flex');
    });

    $('#close-modal-btn').on('click', () => $('#edit-value-modal').hide());

    $('#edit-value-form').on('submit', function (e) {
        e.preventDefault();
        $('[id^="edit-error-"]').text('');
        const msgBox = $('#edit-value-message');
        msgBox.hide();
        const btn = $('#edit-value-btn');
        btn.text('Saving...').prop('disabled', true);
        const id = $('#edit-value-id').val();

        const formData = new FormData(this);
        formData.append('_method', 'PUT');

        $.ajax({
            url: `/admin/core-values/${id}`,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').first().val(), 'Accept': 'application/json' },
            success: function (data) {
                btn.text('Save Changes').prop('disabled', false);
                msgBox.text(data.message || 'Updated!').css({ background: '#d4edda', color: '#155724', border: '1px solid #c3e6cb' }).show();
                setTimeout(() => location.reload(), 1000);
            },
            error: function (xhr) {
                btn.text('Save Changes').prop('disabled', false);
                const errors = xhr.responseJSON?.errors;
                if (errors) {
                    $.each(errors, (field, messages) => $('#edit-error-' + field).text(messages[0]));
                } else {
                    msgBox.text('Something went wrong.').css({ background: '#f8d7da', color: '#721c24', border: '1px solid #f5c6cb' }).show();
                }
            }
        });
    });

    // ── Delete Core Value ──
    $(document).on('click', '.delete-value-btn', function () {
        if (!confirm('Are you sure you want to delete this value?')) return;
        const id  = $(this).data('id');
        const row = $('#value-row-' + id);

        $.ajax({
            url: `/admin/core-values/${id}`,
            method: 'POST',
            data: { _method: 'DELETE' },
            headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').first().val(), 'Accept': 'application/json' },
            success: function () {
                row.fadeOut(400, () => row.remove());
            },
            error: function () {
                alert('Failed to delete. Please try again.');
            }
        });
    });

</script>
</body>
</html>