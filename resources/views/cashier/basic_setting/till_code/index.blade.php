<x-admin>
    @section('title','Till Number')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Till Number Table</h3>
            <div class="card-tools">
                <a href="{{ route('cashier.till.create') }}" class="btn btn-sm btn-info">New</a>
            </div>
        </div>
        <div class="card-body"  style="overflow-x:auto;">
            <table class="table table-striped" id="categoryTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $cat)
                        <tr>
                            <td>{{ $cat->name }}</td>
                            <td><a href="{{ route('cashier.till.edit', encrypt($cat->id)) }}"
                                    class="btn btn-sm btn-primary">Edit</a></td>
                            <td>
                                <form action="{{ route('cashier.till.destroy', encrypt($cat->id)) }}" method="POST"
                                    onsubmit="return confirm('Are sure want to delete?')">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @section('js')
        <script>
            $(function() {
                $('#categoryTable').DataTable({
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                    "responsive": true,
                });
            });
        </script>
    @endsection
</x-admin>
