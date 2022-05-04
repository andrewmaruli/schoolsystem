<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Parent Dashboard!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're Login :)
                </div>
            </div>
        </div>
    </div>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                    <?php
                    $dbconnection=mysqli_connect('127.0.0.1',"root","","webpageaws");
                    $sql = "SELECT `id`, `title`, `date`, `description` FROM posts";
                    $result = mysqli_query($dbconnection, $sql);

                    while($row = $result->fetch_assoc()) { ?>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="feedbody">
                        <div><b><?php echo $row["title"]; ?></b></div>
                        <div class="feed-data"><?php echo $row["date"]; ?></div>
                        <div><?php echo $row["description"]; ?></div>
                        <br>
                        </div>
                    </div>
                     </div>
                    <?php } ?>     


        </div>
    </div>
</x-app-layout>
