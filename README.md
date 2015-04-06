blog-symfony
============

1) If composer update command fails, enable swap in vagrant:

    ex: /bin/dd if=/dev/zero of=/var/swap.1 bs=1M count=1024
    
        /sbin/mkswap /var/swap.1
        
        /sbin/swapon /var/swap.1