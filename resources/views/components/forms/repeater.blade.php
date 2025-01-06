<div id="repeater-container-{{ $name }}">
    <h5>{{ $label }}</h5>

    @php
        // Ensure $qualifications is an array to avoid count() errors
        $qualifications = $values ?? [];

        // If qualifications are empty, add a default empty qualification
        if (empty($qualifications)) {
            $qualifications[] = ['title' => '', 'proof' => ''];
        }
    @endphp

    @foreach ($qualifications as $index => $qualification)
        <div class="item-group d-flex flex-column">
            <input type="text" name="{{ $name }}[{{ $index }}][title]" placeholder="Title"
                class="form-control mb-2"
                value="{{ old($name . '.' . $index . '.title', $qualification['title'] ?? '') }}">

            <label for="proof-{{ $name }}-{{ $index }}">
                @if (!empty($qualification['proof']))
                    @if (strpos($qualification['proof'], '.pdf') !== false)
                        <div class="pdf-preview mt-3" id="current-proof-{{ $name }}-{{ $index }}">
                            <img src="{{ asset('assets/img/pdf-icon.png') }}" alt="PDF icon" class="pdf-icon">
                            <span class="pdf-filename">{{ basename($qualification['proof']) }}</span>
                        </div>
                    @else
                        <img src="{{ asset('storage/' . $qualification['proof']) }}" alt="current image"
                            class="img-fluid mt-3" id="current-proof-{{ $name }}-{{ $index }}">
                    @endif
                @else
                    <img src="{{ asset('assets/img/upload.png') }}" alt="upload placeholder" height="70px"
                        width="70px" class="img-fluid upload-icon mt-3"
                        id="current-proof-{{ $name }}-{{ $index }}">
                @endif
            </label>

            <input type="file" name="{{ $name }}[{{ $index }}][proof]"
                id="proof-{{ $name }}-{{ $index }}" class="form-control-file d-none"
                accept=".pdf,.jpg,.jpeg,.png,.gif">


            <button type="button" class="btn btn-danger btn-sm remove-item mt-2 w-75">Remove</button>
            <span>You can upload a pdf, jpg, jpeg, png, or gif file</span>
        </div>
    @endforeach
</div>
<button type="button" id="add-item" class="btn btn-secondary">Add {{ $label }}</button>

@push('scripts')
    <script>
        $(document).ready(function() {
            //convert $name to a js variable
            var name = "{{ $name }}";
            let itemIndex = {{ count($qualifications) }}; // Start from the next index

            // Function to create a new item group
            function createNewItemGroup(index) {
                return `
                <div class="item-group">
                    <input type="text" name="{{ $name }}[${index}][title]" placeholder="Title" class="form-control mb-2">
                    <label for="proof-{{ $name }}-${index}">
                        <img src="{{ asset('assets/img/upload.png') }}" alt="upload placeholder" height="70px" width="70px" class="img-fluid upload-icon mt-3" id="current-proof-{{ $name }}-${index}">
                    </label>
                    <input type="file" name="{{ $name }}[${index}][proof]" id="proof-{{ $name }}-${index}" class="form-control-file d-none">
                    <button type="button" class="btn btn-danger remove-item mt-2">Remove</button>
                </div>
            `;
            }

            // Function to handle file input changes
            function handleFileChange(input) {
                const id = input.attr('id');
                const file = input[0].files[0];

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        console.log('id', id)
                        const index = id.split('-')[2]; // Extract the index from the ID
                        if (file.type.includes('image')) {
                            $(`#current-proof-${name}-${index}`).attr('src', e.target
                                .result); // Update image preview

                            console.log('path', `#current-proof-${name}-${index}`)
                        } else if (file.type === 'application/pdf') {
                            // Replace the image with a PDF icon and filename
                            $(`#current-proof-{{ $name }}-${index}`).replaceWith(`
                            <div class="pdf-preview mt-3" id="current-proof-{{ $name }}-${index}">
                                <label for="proof-${index}">
                                    <img src="{{ asset('assets/img/pdf-icon.png') }}" alt="PDF icon" class="pdf-icon">
                                    <span class="pdf-filename">${file.name}</span>
                                </label>
                            </div>
                        `);
                        }
                    };

                    reader.readAsDataURL(file);
                }
            }

            // Remove item group on button click
            $(`#repeater-container-${name}`).on('click', '.remove-item', function() {
                $(this).closest('.item-group').remove();
            });

            // Add new item group on button click
            $('#add-item').on('click', function() {
                const newItemGroup = createNewItemGroup(itemIndex);
                $(`#repeater-container-${name}`).append(newItemGroup);
                itemIndex++;
            });

            // Delegate the change event to the container, handling future inputs usi
            $(`#repeater-container-${name}`).on('change', 'input[type="file"]', function() {
                handleFileChange($(this));
            });
        });
    </script>
@endpush
