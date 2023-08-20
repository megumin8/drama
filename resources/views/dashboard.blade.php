@extends('layout.admin')

@section('content')
    <?php
    //log area
    //var_dump($user);
    ?>


    <section class="dramalist">


        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Cover</th>
                    <th>Disp</th>
                    <th><button class="btn btn-primary" onclick="showModal('','{{ route('addDrama') }}')">Add</button></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($dramas as $drama)
                    <tr>
                        <td>{{ $drama->name }}</td>
                        <td><img src="{{ $drama->cover }}" alt="{{ $drama->name }}" class="coverimg"></td>
                        <td>{{ $drama->disp }}</td>
                        <td>
                            <a href="{{ route('deletedrama', ['id' => $drama->id]) }}"><i class="uil uil-trash-alt"></i></a>
                            <a><i class="uil uil-pen"
                                    onclick="showModal('{{ json_encode($drama) }}','{{ route('editDrama') }}')"></i></a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>



    </section>
    <script>
        <?php echo 'const csrf = `'; ?> @csrf <?php echo '`;'; ?>
        <?php echo 'const default_cover = "' . asset('images/logo.png') . '";'; ?>

        function showModal(drama = null, action = '') {

            let name = "";
            let disp = "";
            let id = "";
            let cover = default_cover;
            if (drama != 'null' && drama != '') {
                drama = JSON.parse(drama);
                name = drama.name;
                disp = drama.disp;
                cover = drama.cover;
                id = `
    <input type="hidden"  name="id" id="id"  value="${drama.id}">

    `;
            }
            let modal = document.createElement('div');
            let modal_id = 'md' + Math.random();
            modal.classList.add('modal', 'active');
            modal.id = modal_id;
            let inner = `

<a  class="modal-overlay" aria-label="Close" onclick="closemodal('${modal_id}')"></a>
<div class="modal-container">
  <div class="modal-header">
    <a  class="btn btn-clear float-right" aria-label="Close" onclick="closemodal('${modal_id}')"></a>
    <div class="modal-title h5">Modal title</div>
  </div>
  <div class="modal-body">
    <div class="content" id="content">
        <form action="${action}" class="form form-inline" method="POST" enctype="multipart/form-data">
            ${csrf}
            <div class="form-group form-inline">
                ${id}
                <input type="hidden"  name="cvi" id="cvi"  value="${cover}">
                <input type="text" class="form-input form-inline" name="name" id="name" placeholder="Drama Name"  value="${name}" required>
                <img src="${cover}" alt="" id="coverimg" class="coverimg">
                <input type="file" accept="image/*" class="form-input form-inline" name="cover" id="cover" onchange="imagechange(event)">
                <input type="text" class="form-input form-inline" name="disp" id="disp" placeholder="Drama Disp" value="${disp}">
                <input type="submit" class="form-submit">
            </div>
        </form>
    </div>
  </div>

</div>


`;
            modal.innerHTML = inner;
            document.body.appendChild(modal);
        }

        function closemodal(id) {
            let modal = document.getElementById(id);
            modal.remove();
        }

        function imagechange(event) {
            let image = document.getElementById('coverimg');
            image.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
