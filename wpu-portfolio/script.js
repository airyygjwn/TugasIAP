function searchMovie() {
  $('#movie-list').html(''); // bersihkan dulu hasil sebelumnya

  $.ajax({
    url: 'http://www.omdbapi.com',
    type: 'get',
    dataType: 'json',
    data: {
      'apikey': '99e3bc5',
      's': $('#search-input').val()
    },
    success: function (result) {
      if (result.Response == "True") {
        let movies = result.Search;
        $.each(movies, function (i, data) {
          $('#movie-list').append(`
            <div class="col-md-4 my-3">
              <div class="card">
                <img src="${data.Poster}" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title">${data.Title}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">${data.Year}</h6>
                  <a href="#" class="btn btn-primary see-detail" data-toggle="modal" data-target="#exampleModal" data-id="${data.imdbID}">See Detail</a>
                </div>
              </div>
            </div>
          `);
        });
      } else {
        $('#movie-list').html(`
          <div class="col">
            <h1 class="text-center">${result.Error}</h1>
          </div>
        `);
      }
    }
  });
}

// Ketika tombol search diklik
$('#search-button').on('click', function () {
  searchMovie();
});

// Ketika pencet Enter di kolom input
$('#search-input').on('keyup', function (e) {
  if (e.key === 'Enter') {
    searchMovie();
  }
});

// Ketika klik See Detail
$('#movie-list').on('click', '.see-detail', function () {
  $.ajax({
    url: 'http://www.omdbapi.com',
    type: 'get',
    dataType: 'json',
    data: {
      'apikey': '99e3bc5',
      'i': $(this).data('id')
    },
    success: function (movie) {
      if (movie.Response == "True") {
        $('.modal-title').html(movie.Title);
        $('.modal-body').html(`
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-4">
                <img src="${movie.Poster}" class="img-fluid">
              </div>
              <div class="col-md-8">
                <ul class="list-group">
                  <li class="list-group-item"><strong>Released:</strong> ${movie.Released}</li>
                  <li class="list-group-item"><strong>Genre:</strong> ${movie.Genre}</li>
                  <li class="list-group-item"><strong>Director:</strong> ${movie.Director}</li>
                  <li class="list-group-item"><strong>Actors:</strong> ${movie.Actors}</li>
                  <li class="list-group-item"><strong>Plot:</strong> ${movie.Plot}</li>
                </ul>
              </div>
            </div>
          </div>
        `);
      }
    }
  });
});
