<div class="table-responsive">
    <table class="table table-striped table-hover table-dark">
        <thead>
        <tr>
            @foreach ($heads as $head)
                <th>{{ $head }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @forelse ($dataset as $data)
            <tr>
            @foreach ($attr as $attribute)
                <td>{{ $data->$attribute }}</td>
            @endforeach
            </tr>
        @empty
            <tr><td>No data records</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
