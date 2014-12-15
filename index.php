<?php include 'header.php';?>
<div id="content">

<div id="content-top">
<div class="ctop-c">
<h1>Politweets</h1>
</div>
</div>

<div id="content-content">

<?php

                require_once('src/Basho/Riak/Riak.php');
                require_once('src/Basho/Riak/Bucket.php');
                require_once('src/Basho/Riak/Exception.php');
                require_once('src/Basho/Riak/Link.php');
                require_once('src/Basho/Riak/MapReduce.php');
                require_once('src/Basho/Riak/Object.php');
                require_once('src/Basho/Riak/StringIO.php');
                require_once('src/Basho/Riak/Utils.php');
                require_once('src/Basho/Riak/Link/Phase.php');
                require_once('src/Basho/Riak/MapReduce/Phase.php');

                                $client = new Basho\Riak\Riak('172.31.32.109',10018);
                                $myBucket = $client->bucket('world');
                                $keys = $myBucket->getKeys();

                for($x=0; $x<=sizeof($keys); $x++) {
                $fetched = $myBucket->get($keys[$x]);
                $data = $fetched->getData();

		/* BOX WRAPPER #1*/
		echo '<div class="ctweet">';

		/*PROFILE IMAGE*/
        echo $data['profile_image_url']. "\n";		

		/*DIV FOR BOX*/
        echo '<div class="ctheader">';
		echo '<div class="ct">';
		
		echo '<a class="ttitel" href="http://twitter.com/';
        echo $data['screen_name']. "\n";
		echo '">';
        echo $data['screen_name']. "\n";
		echo '</a>';

        echo '<div class="datum">';
        echo $data['created_at']."\r\n";
        echo '</div>';


        echo '<div class="tcontent"><p>';
        echo $data['text']. "<br>";
        echo '</p></div>';

		/* BOX WRAPPER END #1 */
		echo '</div>';
}
?>

</div>

</div>

<?php include 'footer.php'; ?>