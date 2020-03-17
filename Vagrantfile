# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  config.vm.box = "aekapop/ansible-vm"
  config.vm.box_url = "http://10.80.5.61/88733059/package.box"

  config.vm.provider "virtualbox" do |vb|
    vb.memory = 512
    vb.cpus = 1
  end

  boxes = [
    { :name => "ansible-mgn", :ip => "192.168.100.11" },
    { :name => "server-01", :ip => "192.168.100.80" },
    { :name => "server-02", :ip => "192.168.100.81" },
    { :name => "server-03", :ip => "192.168.100.82" },
    { :name => "server-04", :ip => "192.168.100.12" },
  ]

  boxes.each do |opts|
    config.vm.define opts[:name] do |config|
      config.vm.hostname = opts[:name]
      config.vm.network :private_network, ip: opts[:ip]
      if opts[:name] == "ansible-mgn"
        config.vm.provision :shell, :inline => <<'EOF'
if [ ! -f "/home/vagrant/.ssh/id_rsa" ]; then
  ssh-keygen -t rsa -N "" -f /home/vagrant/.ssh/id_rsa
fi
cp  /home/vagrant/.ssh/id_rsa.pub /vagrant/ansible-mgn.pub
cat << 'SSHEOF' > /home/vagrant/.ssh/config
Host *
  StrictHostKeyChecking no
  UserKnownHostsFile=/dev/null
SSHEOF
chown -R vagrant:vagrant /home/vagrant/.ssh/
EOF
      end
      config.vm.provision :shell, inline: 'cat /vagrant/ansible-mgn.pub >> /home/vagrant/.ssh/authorized_keys'
    end
  end
end
