<!--begin::Block-->
<div class="py-5">
    <div class="table-responsive">
        <table class="table table-hover table-row-dashed table-row-gray-300 gy-1">
            <thead>
                <tr class="fw-bold fs-6 text-gray-800">
                    <th>#</th>
                    <th>Track ID</th>
                    <th>Track Title</th>
                    <th>Track Label</th>
                    <th>Narrator</th>
                    <th>Duration</th>
                    <th>Free/Premium</th>
                    <th>Validation</th>
                </tr>
            </thead>
            <tbody>
               @isset($tracks)
                   @foreach ($tracks as $item)
                       <tr>
                           <td>{{ $loop->index + 1 }}</td>
                           <td>{{ $content->id .' - '. $item->id }}</td>
                           <td>{{ $item->title}}</td>
                           <td>Bölüm {{ $loop->iteration }}</td>
                           <td>{{ $item->admin->name}}</td>
                           <td>{{ $item->duration }}</td>
                           <td><span class="badge badge-light-{{ ($item->isFree) ? 'info' : 'warning' }} fw-bolder">{{ ($item->isFree) ? 'Premium' : 'Free' }}</span></td>
                           <td><span class="badge badge-light-{{ ($item->isValid) ? 'primary' : 'danger' }} fw-bolder">{{ ($item->isValid) ? 'Valid' : 'inValid' }}</span></td>
                       </tr>
                   @endforeach
               @else
                   <tr>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                   </tr>
               @endif
            </tbody>
        </table>
    </div>
</div>
<!--end::Block-->
