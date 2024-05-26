<?= $this->extend('templates/layout')  ?>
<?= $this->section('content') ?>

<div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg-mx-8 lg:px-8" x-data="fetchData" x-init="$nextTick(()=> {init})">

    <!-- button -->
    <div class="flex items-center justify-between py-4">
        <div>
            <h1 class="text-2xl font-semibold leading-relaxed text-gray-800">Movies</h1>
            <p class="text-sm font-medium text-gray-500">
                Get every movies from TMDB and enjoy your moment
            </p>
        </div>
        <button class="inline-flex gap-x-2 items-center py-2.5 px-6 text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-1" x-on:click="modalOpen"
        >
            <span class="text-sm font-semibold tracking-wide">Create Movie</span>
        </button>
    </div>
    <!-- button -->

    <!-- modal -->
    <template x-teleport="body">
        <div id="default-modal" tabindex="-1" aria-hidden="true" x-show="isOpen" :class="isOpen ? '':'hidden' " x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" class="mx-auto overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full" style="background-color: rgba(0,0,0,0.5)">
            <div class="relative p-4 w-full max-w-7xl max-h-full overflow-x-auto relative">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Cari Movies
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal" x-on:click="modalOpen">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->

                    <div class="p-4 md:p-5 space-y-4 overflow-x-auto " x-data="moviesData" x-init="$nextTick(()=> {init})">
                        <!-- search -->
                        <div class="flex gap-x-2 my-6 bg-slate-100 border border-slate-300 rounded px-2 py-4">
                            <input type="text" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none focus:border-indigo-400 focus:ring-1 focus:ring-sky-500 p-2.5" placeholder="ID User" x-model="search" />
                            <button
                                class="inline-flex gap-x-2 items-center py-2.5 px-6 text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-1"
                                x-on:click="searchMovies">
                                <span class="text-sm font-semibold tracking-wide">Search</span>
                            </button>
                        </div>
                        <!-- search -->
                        <!-- fetch data -->
                        <template x-if="!movies.length">
                            <div class="bg-slate-100 border border-slate-300 rounded px-2 py-4 border border-slate-300">
                                <p class="text-medium text-slate-500 text-center">Silahkan cari movies dengan menggunakan fungsi pencarian</p>
                            </div>
                        </template>
                        <template x-if="movies.length > 0">
                            <template x-for="movie in movies" :key="movie.id">
                                <div class="flex items-center gap-x-4">
                                    <img class="w-40 aspect-[3/2] rounded-md object-cover object-top border border-gray-200" :src="movie.poster_path ? 'https://image.tmdb.org/t/p/w500' + movie.poster_path : '<?= base_url("assets/grocery-store.png") ?>' " alt="no image">
                                    <div class="flex-grow flex flex-col w-2/3">
                                        <p class="text-xl font-bold text-indigo-600" x-text="movie.title"></p>
                                        <span class="text-sm font-regular text-slate-400 border-b border-gray-200 truncate" x-text="movie.overview"></span>
                                        <span class="mt-2 text-sm font-semibold text-slate-500">Release Date : <span x-text="movie.release_date ? $dateFormat(movie.release_date) : '1900-12-31' "></span></span>
                                        <span class="text-sm font-semibold inline-flex">
                                            <svg class="text-orange-500" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                            <span class="text-slate-500 ml-1" x-text="Math.round(movie.vote_average * 100)/100"></span>
                                        </span>
                                    </div>
                                    <button class="inline-flex gap-x-2 items-center py-2.5 px-6 text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-1 text-sm font-semibold tracking-wide" x-on:click="saveMovie(movie)">
                                        Save Movie
                                    </button>
                                </div>
                            </template>
                        </template>
                        <!-- fetch data -->
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" x-on:click="modalOpen">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </template>
    <!-- modal -->

    <input type="hidden" name="access_token" value="<?= $access_token ?>" id="access_token">

</div>

<!-- script -->
<script>
    let access_token = document.getElementById('access_token').value;
    function moviesData(){
        return{
            movies: [],
            formData: {
                movie_id: '',
                title: '',
                overview: '',
                vote_average: '',
                poster_path: '',
                realase_date: ''
            },
            search: '',
            searchMovies(){
                if(this.search.length > 0){
                    fetch(`https://api.themoviedb.org/3/search/movie?query=${this.search}`, {
                        method: 'GET',
                        headers: {
                            'Authorization': 'Bearer ' + access_token,
                            'accept': 'application/json',
                        },
                    })
                    .then((response) => {
                        response.json().then((json) => {
                            this.movies = json.results;
                        });
                    }).catch(error => {
                        console.log(error);
                    });
                }else{
                    this.movies = [];
                }
            },
            setForm(data){
                this.formData.movie_id = data.id;
                this.formData.title = data.title;
                this.formData.overview = data.overview;
                this.formData.vote_average = data.vote_average;
                this.formData.poster_path = data.poster_path;
                this.formData.realase_date = data.release_date;
            },
            saveMovie(data){
                this.setForm(data);
                console.log(this.formData);
            },
            init(){
                this.searchMovies();
            }
        }
    }
</script>
<!-- script -->

<?= $this->endSection() ?>