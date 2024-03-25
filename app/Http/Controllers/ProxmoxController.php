<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpseclib3\Net\SSH2 as NetSSH2;
use Exception;
use App\Http\Controllers\Controller;

class ProxmoxController extends Controller
{
    public function createContainer(Request $request)
    {
//        try {

            // Extract inputs from the request
//            $vmid = $request->input('vmid');
//            $memory = $request->input('memory');
//            $cores = $request->input('cores');
//            $diskStorage = $request->input('disk_storage');

            $vmid = 109;
            $memory = 16;
            $cores = 2;
            $diskStorage = 20;

            // Generate a random password
            $password = 'password123';

            // Define the hostname
            $hostname = 'ubuntu';

            // SSH into the Proxmox server
            $ssh = new NetSSH2('202.56.3.61', 10236);
            if (!$ssh->login('root', 'prox@cb78')) {
                $this->error('SSH authentication failed');
                return;
            }


            // Define the command to create a container
            $command = "pvesh create /nodes/cloudbloc/lxc \
            --vmid $vmid \
            --hostname $hostname \
            --storage lvm1 \
            --password '$password' \
            --ostemplate local:vztmpl/ubuntu-22.04-standard_22.04-1_amd64.tar.zst \
            --memory $memory \
            --cores $cores \
            --rootfs $diskStorage \
            --net0 name=eth0,bridge=vmbr0,ip=dhcp";

            $ssh->exec($command);

//            dd($ssh->exec($command));
            // Start the container
//            $startCommand = "pvesh create /nodes/cloudbloc/lxc/$vmid/status/start";
//            $ssh->exec($startCommand);

            // Execute commands inside the container
//            $ssh->write("pct enter $vmid << EOF\n");
//            $ssh->write("# Enable SSH access for root\n");
//            $ssh->write("sed -i 's/PermitRootLogin no/PermitRootLogin yes/' /etc/ssh/sshd_config\n");
//            $ssh->write("# Restart SSH service\n");
//            $ssh->write("service ssh restart\n");
//            $ssh->write("# Create additional user (if needed)\n");
//            $ssh->write("adduser ubuntu\n");
//            $ssh->write("# Allow SSH access for the additional user\n");
//            $ssh->write("usermod -aG sudo ubuntu\n");
//            $ssh->write("echo \"ubuntu ALL=(ALL) NOPASSWD:ALL\" >> /etc/sudoers\n");
//            $ssh->write("EOF\n");
//            $ssh->read();

            // Close the SSH connection
            $ssh->disconnect();

//            return response()->json([
//                'code' => 200,
//                'message' => 'Container created successfully',
//                'result' => [
//                    'vmid' => $vmid,
//                    'hostname' => $hostname,
//                    'memory' => $memory,
//                    'cores' => $cores,
//                    'disk_storage' => $diskStorage,
//                    'password' => $password
//                ]
//            ]);
//        } catch (Exception $e) {
//            return response()->json([
//                "code" => 400,
//                "message" => "Failed to create container",
//                'result' => null,
//                'error' => $e->getMessage(),
//            ], 500);
//        }
    }

    public function startContainer($vmid)
    {
        try {

            $ssh = new NetSSH2('202.56.3.61', 10236);
            if (!$ssh->login('root', 'prox@cb78')) {
                $this->error('SSH authentication failed');
                return;
            }

            // Define the command to start the container
            $command = "pvesh create /nodes/cloudbloc/lxc/$vmid/status/start";
            $ssh->exec($command);

            // Close the SSH connection
            $ssh->disconnect();

            return response()->json([
                'code' => 200,
                'message' => 'Container started successfully'
            ]);
        } catch (Exception $e) {
            return response()->json([
                "code" => 400,
                "message" => "Failed to start container",
                'result' => null,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function stopContainer($vmid)
    {
        try {
            $ssh = new NetSSH2('202.56.3.61', 10236);
            if (!$ssh->login('root', 'prox@cb78')) {
                $this->error('SSH authentication failed');
                return;
            }

            // Define the command to stop the container
            $command = "pvesh create /nodes/cloudbloc/lxc/$vmid/status/stop";
            $ssh->exec($command);

            // Close the SSH connection
            $ssh->disconnect();

            return response()->json([
                'code' => 200,
                'message' => 'Container stopped successfully'
            ]);
        } catch (Exception $e) {
            return response()->json([
                "code" => 400,
                "message" => "Failed to stop container",
                'result' => null,
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
