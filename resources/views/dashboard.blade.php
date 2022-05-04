<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Hi Admin!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">


                    <?php
                    $dbconnection=mysqli_connect('127.0.0.1',"root","","webpageaws");
                    $sql = "SELECT `id`, `title`, `date`, `description` FROM posts";
                    $result = mysqli_query($dbconnection, $sql);

                    while($row = $result->fetch_assoc()) { ?>
                    <?php echo  $row["date"]; ?>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h1><b><?php echo $row["title"]; ?></b></h1>
                        <br>
                        
                        <?php echo $row["description"]; ?>
                        <br>

                    </div>
                     </div>
                    <?php } ?>     


        </div>
    </div>
</x-app-layout>
