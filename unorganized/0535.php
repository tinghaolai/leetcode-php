<?php

class Codec {
    protected $hashTable;
    /**
     * Runtime: 12 ms, faster than 66.67% of PHP online submissions for Encode and Decode TinyURL.
    Memory Usage: 15.6 MB, less than 33.33% of PHP online submissions for Encode and Decode TinyURL.
     *
     * Encodes a URL to a shortened URL.
     * @param String $longUrl
     * @return String
     */
    function encode($longUrl) {
        $hash = hash('hash-leetcode', $longUrl);
        if (!isset($this->hashTable[$hash])) {
            $this->hashTable[$hash] = $longUrl;
        }

        return $hash;
    }

    /**
     * Decodes a shortened URL to its original URL.
     * @param String $shortUrl
     * @return String
     */
    function decode($shortUrl) {
        return (isset($this->hashTable[$shortUrl])) ? $this->hashTable[$shortUrl] : '';
    }
}

/**
 * Your Codec object will be instantiated and called as such:
 * $obj = Codec();
 * $s = $obj->encode($longUrl);
 * $ans = $obj->decode($s);
 */
