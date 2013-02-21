# Fetch

Fetch is a thin PHP wrapper around PHP's Curl libraries.

## Make a Request

`Fetch` has lots of options you can set and my examples aren't exhaustive, just take a look at
the code in `Fetch.php` to see what options you can set.

### To fetch one url (and wait while it downloads)

    include("FetchBase.php");
    include("Fetch.php");
    include("FetchResponse.php");

    $f = new Fetch('http://example.com');
    $r = $f->get();

    echo $r->getCode();
    echo $r->getHeaders();
    echo $r->getBody();

### To fetch multiple urls (while you do something else)

    $urls = array(
      'http://example.com',
      'https://example2.com'
    );
    $fs = array();

    foreach($urls as $url){
      $f = newFetch($url);
      $f->start();
      $fs[] = $f;

    }//foreach

    /* Now do whatever else you want to do, go crazy!!! */

    foreach($fs as $f){
      $r = $f->stop();
      echo $r->getCode();
      echo $r->getHeaders();
      echo $r->getBody();

    }//foreach

### To fetch a file

    $path = '/local/path/to/file';

    $f = new Fetch('http://example.com/remote/path/to/file');
    $f->setPath($path);
    $r = $f->get();
    $path = $r->getPath();
    echo file_exists($path);

You can also download the files in the background:

    $file_urls = array(
      'http://example.com/remote/path/to/file',
      'https://example2.com/remote/path/to/file'
    );
    $fs = array();

    foreach($file_urls as $file_url){
      $f = newFetch($file_url);
      $f->start();
      $fs[] = $f;

    }//foreach

    /* Now do whatever else you want to do while the files download, go crazy!!! */

    foreach($fs as $f){
      $r = $f->stop();
      $path = $r->getPath();
      echo file_exists($path);

    }//foreach

## Why would I use this over Zend Framework's HTTP Request among others?

Eh, you probably wouldn't, truth is I've had this code lying around in some state since about 2005. In
that time it has gone through multiple rewrites, of which this is the latest; but since it is already written, I
 figured I would make it available since it does work and it is pretty bulletproof, and it does do what I want it to do, 
and it is extremely lightweight, just three files, so it is easy to include in a small project.

## License

MIT, pull requests are welcome also.

