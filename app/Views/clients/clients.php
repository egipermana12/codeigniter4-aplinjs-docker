<?= $this->extend('templates/layout')  ?>
<?= $this->section('content') ?>

<div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg-mx-8 lg:px-8" x-data="clientInit" x-init="$nextTick(()=> {init})">

    <!-- button -->
    <div class="flex items-center justify-between py-4">
        <div>
            <h1 class="text-2xl font-semibold leading-relaxed text-gray-800">Clients</h1>
            <p class="text-sm font-medium text-gray-500">
                Let's start and grow your skill from here
            </p>
        </div>
        <button class="inline-flex gap-x-2 items-center py-2.5 px-6 text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-1"
        >
            <span class="text-sm font-semibold tracking-wide">Create Item</span>
        </button>
    </div>
    <!-- button -->

    <!-- search -->
    <div class="grid gap-6 md:grid-cols-3 my-6 bg-slate-100 border border-slate-300 rounded px-2 py-4">
        <div>
            <input type="text" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none focus:border-indigo-400 focus:ring-1 focus:ring-sky-500 p-2.5" placeholder="Username" x-model="name" />
        </div>
        <div>
            <input type="text" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none focus:border-indigo-400 focus:ring-1 focus:ring-sky-500 p-2.5" placeholder="Email" x-model="email" />
        </div>
        <div class="flex gap-4">
            <div class="grow">
                <input type="text" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none focus:border-indigo-400 focus:ring-1 focus:ring-sky-500 p-2.5" placeholder="ID User" x-model="id" />
            </div>
            <div class="flex-none">
                <button
                class="inline-flex gap-x-2 items-center py-2.5 px-6 text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-1" x-on:click="search"
                >
                <span class="text-sm font-semibold tracking-wide">Search</span>
                </button>
            </div>
        </div>
    </div>
    <!-- search -->

    <!-- table -->
    <div class="align-middle inline-block min-w-full rounded border border-slate-300 shadow overflow-hidden mt-4relative">
        <table class="min-w-full overflow-hidden">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Username
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>

                <!-- skeletong loading -->
                <template x-if="isLoading">
                    <template x-for="i in 5">
                        <tr class="animate-pulse">
                            <td class="px-6 py-3 whitespace-normal overflow-hidden border-b border-gray-200">
                                <span class="text-xs leading-5 text-transparent bg-gray-300 rounded-lg mb-2" x-data="{ text: Math.random().toString(6) }" x-text="text"></span>
                            </td>
                            <td class="px-6 py-3 whitespace-normal overflow-hidden border-b border-gray-200">
                                <span class="text-xs leading-5 text-transparent bg-gray-300 rounded-lg mb-2" x-data="{ text: Math.random().toString(6) }" x-text="text"></span>
                            </td>
                            <td class="px-6 py-3 whitespace-normal overflow-hidden border-b border-gray-200">
                                <span class="text-xs leading-5 text-transparent bg-gray-300 rounded-lg mb-2" x-data="{ text: Math.random().toString(8) }" x-text="text"></span>
                            </td>
                            <td class="px-6 py-3 whitespace-normal overflow-hidden border-b border-gray-200">
                                <span class="text-xs leading-5 text-transparent bg-gray-300 rounded-lg mb-2" x-data="{ text: Math.random().toString(10) }" x-text="text"></span>
                            </td>
                            <td class="px-6 py-3 whitespace-normal overflow-hidden border-b border-gray-200">
                                <span class="text-xs leading-5 text-transparent bg-gray-300 rounded-lg mb-2" x-data="{ text: Math.random().toString(12) }" x-text="text"></span>
                            </td>
                        </tr>
                    </template>
                </template>
                <!-- skeletong loading -->

                <!-- real data -->
                <template x-if="!isLoading">
                    <template x-for="client in clients" :key="client.id">
                        <tr>
                            <td class="px-6 py-3 whitespace-normal overflow-hidden border-b border-gray-200">
                                <span class="text-sm leading-5 font-medium text-gray-900" x-text="client.id +' '+client.name"></span>
                            </td>
                            <td class="px-6 py-3 whitespace-normal overflow-hidden border-b border-gray-200">
                                <span class="text-sm leading-5 text-gray-900" x-text="client.email"></span>
                            </td>
                            <td class="px-6 py-3 whitespace-normal overflow-hidden border-b border-gray-200">
                                <span class="text-sm leading-5 text-gray-900" x-text="client.saldo"></span>
                            </td>
                            <td class="px-6 py-3 whitespace-normal overflow-hidden border-b border-gray-200">
                                <span class="text-sm leading-5 text-gray-900" x-text="client.created_at"></span>
                            </td>
                        </tr>
                    </template>
                </template>
                <!-- real data -->
            </tbody>
        </table>

        <!-- start pagination -->
        <div class="bg-white px-4 py-3 flex items-center justify-between sm:px-6">
            <div class="flex-1 flex justify-between sm:hidden">

            </div>
        </div>
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between p-2">
            <div>
                <p class="text-sm leading-5 text-gray-700">
                    Showing
                    <span class="font-medium" x-text="firstItem()"></span>
                    to
                    <span class="font-medium" x-text="lastItem()"></span>
                    of
                    <span class="font-medium" x-text="totalData"></span>
                    results
                </p>
            </div>
            <!-- pagelink -->
            <div>
                <span class="relative z-0 inline-flex shadow-sm">

                    <button type="button" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" x-bind:class="{'cursor-not-allowed': firstUrl == currentPage}" @click="init(firstUrl, params)" x-bind:disabled="firstUrl == currentPage">
                      <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.70679 5.29303C9.89426 5.48056 9.99957 5.73487 9.99957 6.00003C9.99957 6.26519 9.89426 6.5195 9.70679 6.70703L6.41379 10L9.70679 13.293C9.88894 13.4816 9.98974 13.7342 9.98746 13.9964C9.98518 14.2586 9.88001 14.5094 9.6946 14.6948C9.5092 14.8803 9.25838 14.9854 8.99619 14.9877C8.73399 14.99 8.48139 14.8892 8.29279 14.707L4.29279 10.707C4.10532 10.5195 4 10.2652 4 10C4 9.73487 4.10532 9.48056 4.29279 9.29303L8.29279 5.29303C8.48031 5.10556 8.73462 5.00024 8.99979 5.00024C9.26495 5.00024 9.51926 5.10556 9.70679 5.29303V5.29303Z" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.7065 5.29279C15.894 5.48031 15.9993 5.73462 15.9993 5.99979C15.9993 6.26495 15.894 6.51926 15.7065 6.70679L12.4135 9.99979L15.7065 13.2928C15.8887 13.4814 15.9895 13.734 15.9872 13.9962C15.9849 14.2584 15.8798 14.5092 15.6944 14.6946C15.509 14.88 15.2581 14.9852 14.9959 14.9875C14.7337 14.9897 14.4811 14.8889 14.2925 14.7068L10.2925 10.7068C10.1051 10.5193 9.99976 10.265 9.99976 9.99979C9.99976 9.73462 10.1051 9.48031 10.2925 9.29279L14.2925 5.29279C14.4801 5.10532 14.7344 5 14.9995 5C15.2647 5 15.519 5.10532 15.7065 5.29279V5.29279Z" />
                        </svg>
                    </button>

                    <!-- prev -->
                    <button type="button" class="-ml-px relative inline-flex items-center px-2 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" x-bind:class="{'cursor-not-allowed': prevUrl == null || firstUrl == currentPage}" @click="init(prevUrl, params)" x-bind:disabled="prevUrl == null || firstUrl == currentPage">
                      <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
                    <!-- prev -->

                    <!-- links -->
                    <template x-for="(page,index) in pages()" :key="index">
                          <button type="button" class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-700 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" :class="{'cursor-not-allowed text-indigo-600 bg-slate-200 hover:text-indigo-600': page.isActive}" :disabled="page.isActive" @click="init(page.url)">
                            <span x-text="page.name"></span>
                        </button>
                    </template>
                    <template v-if="lastUrl !== currentUrl">
                          <span class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-700">
                            ...
                        </span>
                    </template>
                    <!-- links -->

                    <!-- next -->
                    <button type="button" class="-ml-px relative inline-flex items-center px-2 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" x-bind:class="{'cursor-not-allowed': nextUrl == null || lastUrl == currentPage}" @click="init(nextUrl, params)" x-bind:disabled="nextUrl == null || lastUrl == currentPage">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <!-- next -->

                    <button type="button" class="-ml-px relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" x-bind:class="{'cursor-not-allowed': lastUrl == currentPage}" @click="init(lastUrl, params)" x-bind:disabled="lastUrl == currentPage">
                      <svg fill="currentColor" class="h-5 w-5" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.29279 14.707C4.10532 14.5195 4 14.2651 4 14C4 13.7348 4.10532 13.4805 4.29279 13.293L7.58579 9.99998L4.29279 6.70698C4.11063 6.51838 4.00983 6.26578 4.01211 6.00358C4.01439 5.74138 4.11956 5.49057 4.30497 5.30516C4.49038 5.11975 4.74119 5.01458 5.00339 5.01231C5.26558 5.01003 5.51818 5.11082 5.70679 5.29298L9.70679 9.29298C9.89426 9.48051 9.99957 9.73482 9.99957 9.99998C9.99957 10.2651 9.89426 10.5195 9.70679 10.707L5.70679 14.707C5.51926 14.8945 5.26495 14.9998 4.99979 14.9998C4.73462 14.9998 4.48031 14.8945 4.29279 14.707Z" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.2928 14.6947C10.1053 14.5072 10 14.2529 10 13.9877C10 13.7225 10.1053 13.4682 10.2928 13.2807L13.5858 9.98771L10.2928 6.69471C10.1106 6.50611 10.0098 6.25351 10.0121 5.99131C10.0144 5.72911 10.1196 5.4783 10.305 5.29289C10.4904 5.10749 10.7412 5.00232 11.0034 5.00004C11.2656 4.99776 11.5182 5.09855 11.7068 5.28071L15.7068 9.28071C15.8943 9.46824 15.9996 9.72255 15.9996 9.98771C15.9996 10.2529 15.8943 10.5072 15.7068 10.6947L11.7068 14.6947C11.5193 14.8822 11.265 14.9875 10.9998 14.9875C10.7346 14.9875 10.4803 14.8822 10.2928 14.6947Z" />
                    </svg>
                </button>

                </span>
            </div>
            <!-- pagelink -->
        </div>
    <!-- start pagination -->

    </div>
    <!-- table -->


</div>

<!-- script apline -->
<script>
    function clientInit(){
        return {
            name: '',
            email: '',
            id: '',
            params: {},
            isLoading: true,
            clients: [],
            currentPage: 1,
            firstUrl: 1,
            prevUrl: null,
            nextUrl: null,
            lastUrl: null,
            totalData: null,
            perPage: 5,
            visiblePages: 3,
            totalPages(){
                return Math.ceil(this.totalData / this.perPage);
            },
            startPage(){
                if(this.currentPage == 1){
                    return 1;
                }
                if(this.currentPage == this.totalPages()){
                    return this.totalPages() - this.visiblePages + 1;
                }
                return this.currentPage - 1;
            },
            endPage(){
                return Math.min(
                  this.startPage() + this.visiblePages - 1,
                  this.totalPages()
                );
            },
            pages(){
                const range = [];
                for (let i = this.startPage(); i <= this.endPage(); i += 1) {
                  range.push({
                    name: i,
                    isActive: i == this.currentPage,
                    url: i,
                });
              }
              return range;
            },
            firstItem(){
                return this.perPage * this.currentPage - this.perPage + 1;
            },
            lastItem(){
                let lastItem = this.perPage * this.currentPage;
                if(lastItem > this.totalData){
                    return this.totalData;
                }
                return this.perPage * this.currentPage;
            },
            search(){
                if(this.email.length > 0){
                    this.params = {
                        email: this.email
                    }
                }else if(this.name.length > 0){
                    this.params = {
                        name: this.name
                    }
                }else if(this.id.length > 0){
                    this.params = {
                        id: this.id
                    }
                }
                else{
                    this.params = {};
                }

                this.init(this.currentPage, this.params);
            },
            init(page = this.currentPage, params = this.params){

                const url = new URLSearchParams(this.params);

                this.isLoading = true;
                this.page = page;
                fetch(`api/clients?page=${this.page}&${url.toString()}`).then((response) => {
                    response.json().then((json) => {
                        this.isLoading = false;
                        this.clients = json.data;
                        this.totalData = json.count;

                        this.prevUrl = this.page == 1 ? 1 : this.page - 1;
                        this.nextUrl = this.page + 1;

                        this.lastUrl = Math.ceil(this.totalData / this.perPage);

                        this.currentPage = this.page;

                    });

                }).catch(error => {
                    console.log(error);
                });
            }
        }
    }
</script>
<!-- script apline -->

<?= $this->endSection() ?>