<?php

// Define a trait for logging
trait Pesan {
    public function log($message) {
        echo $message . "\n";
    }
}

//Abstract class untuk initialize item
abstract class Item {
    protected $nama;
    protected $harga;

    abstract public function tampil_data();
}

//Class "Product" untuk menampilkan produk yang masuk dalam wishlist
class Product extends Item {
    public function __construct($nama, $harga) {
        $this->nama = $nama;
        $this->harga = $harga;
    }

    public function tampil_data() {
        return "Produk: {$this->nama}, Harga: {$this->harga}";
    }
}


// Class "User" untuk membuat list dari wishlist seorang user
class User {
    use Pesan;

    protected $username;
    protected $wishlist;

    public function __construct($username) {
        $this->username = $username;
        $this->wishlist = [];
    }

    public function tambahWishlist(Item $item) {
        $this->wishlist[] = $item;
        $this->log("{$item->tampil_data()} ditambah ke wishlist {$this->username}");
    }

    public function tampilkanWishlist() {
        $wishlistInfo = [];
        foreach ($this->wishlist as $item) {
            $wishlistInfo[] = $item->tampil_data();
        }

        return json_encode($wishlistInfo, JSON_PRETTY_PRINT);
    }
}

// Example Usage
$user = new User("Amir");

$produk1 = new Product("Laptop", 3500000);
$produk2 = new Product("Hape", 1500000);

$user->tambahWishlist($produk1);
$user->tambahWishlist($produk2);

$wishlistJson = $user->tampilkanWishlist();
echo "Wishlist:\n{$wishlistJson}\n";

?>
