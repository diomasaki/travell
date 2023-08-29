<?php
use Illuminate\Support\Facades\Auth;

$user = Auth::check();
$users = Auth::user();

if (!$user || ($user && !$users->isAdmin)) {
    header("Location: /login");
    exit;
}
?>

<?php
function formatCurrency($value) {
  // Format the value as a currency with thousands separators
  return number_format($value, 0, ',', '.');
}?>


<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link
  href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
  rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css>
  <link rel="icon" href="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/travel-agency-logo%2C-travel-company-logo-%281%29-design-template-bc9dcb1ca0e92d6394dea26418a87c8e_screen.jpg?ts=1667975913">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail</title>
</head>
<body>
<div style="margin-top: 100px;">
        @auth
        @include('components.navbar')
      <div class="detailwisata-container">
          <div id="sliders" class="slider-detail-wisata" style="display: none;">
              <i class="fa fa-close" style="top: 20px; right: 20px; position: absolute; font-size: 30px; color: lightgray; cursor: pointer;" onclick="toogleMenu()"></i>
              <div class="sliderWrapperDetailWisata">
                  <img src="{{ $detailData->img_wisata }}" id="sliderImg" alt="" class="sliderImgWisata"/>
              </div>
          </div>
        <a href="{{ url()->previous() }}" style="text-decoration: none; color: white;"> <button class="bookNow-kembali">Kembali</button></a>
        <div class="detail-wisata-info">
          <h1 class="detail-nama-paket" id="editable-heading-name" contenteditable><i class="fa fa-pencil" aria-hidden="true" style="margin: 0px 10px;"></i>{{$detailData->name}}</h1><button id="edit-submit-btn-name" style="display: none;">Save Changes</button>
          <span class="jarak-paket-wisata" id="editable-heading-description" contenteditable><i class="fa fa-pencil" aria-hidden="true" style="margin: 0px 10px;"></i>
            {{ $detailData->description }}
          </span><button id="edit-submit-btn-description" style="display: none;">Save Changes</button>
          <span class="harga-paket-wisata-detail">
          <small><i class="fa fa-pencil" aria-hidden="true" style="margin: 0px 10px;"></i>Harga Tiket Rp.     </small><small id="editable-heading-price" contenteditable>{{ $detailData->price }}</small><button id="edit-submit-btn-price" style="display: none; margin-top: 15px;">Save Changes</button>
          </span>
          <div class="fpRating">
          <i class="fa fa-pencil" aria-hidden="true" style="margin: 0px 10px;"></i><button id="editable-heading-ratings" contenteditable>{{ $detailData->ratings }}</button>
          </div>
          <button id="edit-submit-btn-ratings" style="display: none;">Save Changes</button>
          <div class="gambar-detail-macam-paket">
              <div class="gambar-detail-wrapper">
                <img
                  id="editable-img"
                  src="{{ asset('uploads/img/' . $detailData->img_wisata) }}"
                  alt=""
                  class="paket-wisata-detailImg"
                  onclick="toogleMenu()"
                />
                <input
                    type="file"
                    id="image-input"
                    accept="image/*"
                    style="margin-top:15px;"
                />
              </div>
          </div></br><button id="edit-submit-btn-image" style="width: 100px; margin-top: 10px;">Save Image</button>
              <?php $count = 1?>
            <div class="deskripsi-paket-wrapper">
              <h1 class="detail-nama-paket">Kota</h1>
              <i class="fa fa-pencil" aria-hidden="true"></i>
              <p class="desc-pkt-wisata" id="editable-heading-kota" contenteditable>
                {{ $detailData->kota }}
              </p><button id="edit-submit-btn-kota" style="display: none;">Save Changes</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('components.footer')
    @endauth
</body>
</html>

<!-- EDIT INPUT -->
<script>
 document.addEventListener('DOMContentLoaded', () => {
    // BORDERS
    const editableHeadingPaket = document.getElementById('editable-heading-name');
    const editableHeadingKota = document.getElementById('editable-heading-description');
    const editableHeadingKategori = document.getElementById('editable-heading-price');
    const editableHeadingRatings = document.getElementById('editable-heading-ratings');
    const editableHeadingKeterangan = document.getElementById('editable-heading-kota');
    const editableHeadingPaketWisataId = document.getElementById('editable-heading-paketwisata_id');
    

    // BUTTON SUBMIT
const editSubmitBtnPaket = document.getElementById('edit-submit-btn-name');
    const editSubmitBtnKota = document.getElementById('edit-submit-btn-description');
    const editSubmitBtnKategori = document.getElementById('edit-submit-btn-price');
    const editSubmitBtnRatings = document.getElementById('edit-submit-btn-ratings');
    const editSubmitBtnKeterangan = document.getElementById('edit-submit-btn-kota');
    const editSubmitBtnPaketWisataId = document.getElementById('edit-submit-btn-paketwisata_id');


    // IMAGES UPLOAD
    const editableImg = document.getElementById('editable-img');
    const imageInput = document.getElementById('image-input');
    const editSubmitBtnImage = document.getElementById('edit-submit-btn-image');



    editableHeadingPaket.addEventListener('input', () => {
        editSubmitBtnPaket.style.display = 'block';
    });

    editSubmitBtnPaket.addEventListener('click', () => {
        const editedContent = editableHeadingPaket.innerText;
        const paketId = {{$detailData->id}}; // Replace with the actual ID of the paketwisata
        const url = `/destinasi/edit/${paketId}/update`;
        const data = { name: editedContent };

        fetch(url, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Laravel CSRF token
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            // Handle response if needed
            editSubmitBtnPaket.style.display = 'none';
        })
        .catch(error => {
            // Handle error if needed
        });
    });


    // PAKET WISATA KOTA HANDLE
    editableHeadingKota.addEventListener('input', () => {
        editSubmitBtnKota.style.display = 'block';
    });

    editSubmitBtnKota.addEventListener('click', () => {
        const editedContent = editableHeadingKota.innerText;
        const paketId = {{$detailData->id}}; // Replace with the actual ID of the paketwisata
        const url = `/destinasi/edit/${paketId}/update`;
        const data = { description: editedContent };

        fetch(url, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Laravel CSRF token
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            // Handle response if needed
            editSubmitBtnKota.style.display = 'none';
        })
        .catch(error => {
            // Handle error if needed
        });
    });


    // PAKET WISATA KATEGORI HANDLE
    editableHeadingKategori.addEventListener('input', () => {
        editSubmitBtnKategori.style.display = 'block';
    });

    editSubmitBtnKategori.addEventListener('click', () => {
        const editedContent = editableHeadingKategori.innerText;
        const paketId = {{$detailData->id}}; // Replace with the actual ID of the paketwisata
        const url = `/destinasi/edit/${paketId}/update`;
        const data = { price: editedContent };

        fetch(url, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Laravel CSRF token
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            // Handle response if needed
            editSubmitBtnKategori.style.display = 'none';
        })
        .catch(error => {
            // Handle error if needed
        });
    });

    // PAKET WISATA RATINGS HANDLE
    editableHeadingRatings.addEventListener('input', () => {
        editSubmitBtnRatings.style.display = 'block';
    });

    editSubmitBtnRatings.addEventListener('click', () => {
        const editedContent = editableHeadingRatings.innerText;
        const paketId = {{$detailData->id}}; // Replace with the actual ID of the paketwisata
        const url = `/destinasi/edit/${paketId}/update`;
        const data = { ratings: editedContent };

        fetch(url, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Laravel CSRF token
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            // Handle response if needed
            editSubmitBtnRatings.style.display = 'none';
        })
        .catch(error => {
            // Handle error if needed
        });
    });




    // PAKET WISATA KETERANGAN HANDLE
    editableHeadingKeterangan.addEventListener('input', () => {
        editSubmitBtnKeterangan.style.display = 'block';
    });

    editSubmitBtnKeterangan.addEventListener('click', () => {
        const editedContent = editableHeadingKeterangan.innerText;
        const paketId = {{$detailData->id}}; // Replace with the actual ID of the paketwisata
        const url = `/destinasi/edit/${paketId}/update`;
        const data = { kota: editedContent };

        fetch(url, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Laravel CSRF token
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            // Handle response if needed
            editSubmitBtnKeterangan.style.display = 'none';
        })
        .catch(error => {
            // Handle error if needed
        });
    });



    // PAKET WISATA ID HANDLE
    editableHeadingPaketWisataId.addEventListener('input', () => {
        editSubmitBtnPaketWisataId.style.display = 'block';
    });

    editSubmitBtnPaketWisataId.addEventListener('click', () => {
        const editedContent = editableHeadingPaketWisataId.innerText;
        const paketId = {{$detailData->id}}; // Replace with the actual ID of the paketwisata
        const url = `/destinasi/edit/${paketId}/update`;
        const data = { paketwisata_id: editedContent };

        fetch(url, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Laravel CSRF token
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            // Handle response if needed
            editSubmitBtnPaketWisataId.style.display = 'none';
        })
        .catch(error => {
            // Handle error if needed
        });
    });


    // PAKET WISATA IMAGE HANDLER
    editableImg.addEventListener('click', () => {
        imageInput.click();
    });

    imageInput.addEventListener('change', () => {
        const file = imageInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                editableImg.src = e.target.result;
                editSubmitBtnImage.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });

    editSubmitBtnImage.addEventListener('click', () => {
        const editedImage = editableImg.src;
        const paketId = {{$detailData->id}}; // Replace with the actual ID of the paketwisata
        const url = `/destinasi/edit/${paketId}/update/image`;
        const data = { img_wisata: editedImage };

        fetch(url, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Laravel CSRF token
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            // Handle response if needed
            editSubmitBtnImage.style.display = 'none';
        })
        .catch(error => {
            // Handle error if needed
        });
    });
});



</script>


<script>


function toogleMenu() {
    var menuContainer = document.getElementById('sliders');
    
    if (menuContainer.style.display === 'none') {
        menuContainer.style.display = 'block';
        menuContainer.style.display = 'flex';
    } else {
        menuContainer.style.display = 'none';
    }
}


</script>



