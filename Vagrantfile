VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

 #Ubuntu 14.04 32-bit
  config.vm.box = "ubuntu/trusty32"

 #bootstrap script for setting up environment  
  config.vm.provision :shell, path: "bootstrap.sh"

 #configure synced folder: current folder to /var/www, and change owner on virtualbox to www-data
 #config.vm.synced_folder ".", "/var/www", create: true, group: "www-data", owner: "www-data"

 #using NFS
 config.vm.synced_folder ".", "/var/www", type: "nfs"
 config.vm.network :private_network, ip: "192.168.56.101"

 # enable virtualbox gui 
 #  config.vm.provider "virtualbox" do |vb|
 #    vb.gui = true
 #  end

 #configure port forwarding
  config.vm.network "forwarded_port", guest: 8080, host: 8080
  
end
