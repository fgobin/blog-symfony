VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

 #Ubuntu 14.04 32-bit
  config.vm.box = "ubuntu/trusty32"

 #bootstrap script for setting up environment  
  config.vm.provision :shell, path: "bootstrap.sh"

 #configure synced folder: current folder to /var/www
 #config.vm.synced_folder ".", "/var/www", create: true, group: "www-data", owner: "www-data"

  config.vm.synced_folder ".", "/var/www", create: true

 # enable virtualbox gui 
 #  config.vm.provider "virtualbox" do |vb|
 #    vb.gui = true
 #  end

end
