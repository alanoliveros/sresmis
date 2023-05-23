<div class="btn-group">
    <a type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false" href="">
        <i class="bi bi-three-dots" style="font-size: 26px;"></i>
    </a>
    <ul class="dropdown-menu">
        <li>
            <a class="dropdown-item" href="{{ $showRoute }}"><i class="bi bi-eye"></i> Show</a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ $editRoute }}"><i class="bi bi-pencil-square"></i> Edit</a>
        </li>
        <li>
            <form id="button-delete" action="{{ $deleteRoute }}" method="POST" onsubmit="return confirmDelete(event)">
                @csrf
                @method('DELETE')
                <button type="submit" class="dropdown-item">
                    <i class="bi bi-trash3"></i> Delete
                </button>
            </form>
        </li>
        <script>
            function confirmDelete(event) {
                event.preventDefault(); // Prevent the form from submitting immediately

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If confirmed, submit the form
                        event.target.submit();
                    }
                });
            }
        </script>
    </ul>
</div>
