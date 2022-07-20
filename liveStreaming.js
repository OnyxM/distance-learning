import AgoraRTC from "agora-rtc-sdk-ng";

let rtc = {
    // For the local audio and video tracks.
    localAudioTrack: null,
    localVideoTrack: null,
    client: null,
};

let options = {
    // Pass your app ID here.
    appId: "4495024a2d414911932996a968fc8559",
    // Set the channel name.
    channel: "fc8559IABbwUWGis6q8BrcLHw",
    // Use a temp token
    token: "0064495024a2d414911932996a968fc8559IADsx3vC3n4Kp32MJGcFquMUJF2SHyL1RR9oW47gcxq8cnXvVzsAAAAAEAA0Cwr7OffYYgEAAQA499hi",
    // Uid
    uid: 6010203,
};

async function startBasicLiveStreaming() {
    // rtc.client = AgoraRTC.createClient({mode: "live",codec: "vp8"});

    window.onload = function () {

        async function userPublished(){
            rtc.client.on("user-published", async (user, mediaType) => {
                // Subscribe to a remote user.
                await rtc.client.subscribe(user, mediaType);

                // Get `RemoteVideoTrack` in the `user` object.
                const remoteVideoTrack = user.videoTrack;
                // Dynamically create a container in the form of a DIV element for playing the remote video track.
                const remotePlayerContainer = document.createElement("div");
                remotePlayerContainer.id = user.uid.toString();
                remotePlayerContainer.style.width = "240px";
                remotePlayerContainer.style.height = "240px";
                remotePlayerContainer.classList.add('m-2');
                remotePlayerContainer.style.transform = "rotateY(180deg)";
                document.getElementById("users_live").append(remotePlayerContainer);

                // Pass the DIV container and the SDK dynamically creates a player in the container for playing the remote video track.
                remoteVideoTrack.play(remotePlayerContainer);

                user.audioTrack.play();
            });
        }

        async function userUnpublished(){
            rtc.client.on("user-unpublished", user => {
                // Get the dynamically created DIV container.
                const remotePlayerContainer = document.getElementById(user.uid);
                // Destroy the container.
                remotePlayerContainer.remove();
            });
        }

        // récupérer les infos des remote users et afficher ...
        //APPELER CETTE FONCTION CHAQUE 5 SEC POUR VOIR SI CELA VA RESOUDRE LE PROBLEME
        async function publishRemoteUsers(rtc){
            for (const tmp_user of rtc.client.remoteUsers) {
                 if(tmp_user.hasVideo){
                     await rtc.client.subscribe(tmp_user, "video");
                     // Dynamically create a container in the form of a DIV element for playing the remote video track.
                     const remotePlayerContainerTemp = document.createElement("div");
                     // Specify the ID of the DIV container. You can use the `uid` of the remote user.
                     remotePlayerContainerTemp.id = tmp_user.uid.toString();
                     remotePlayerContainerTemp.style.width = "240px";
                     remotePlayerContainerTemp.style.height = "240px";
                     remotePlayerContainerTemp.classList.add('m-2');
                     remotePlayerContainerTemp.style.transform = "rotateY(180deg)";
                     document.getElementById("users_live").append(remotePlayerContainerTemp);

                     tmp_user.videoTrack.play(remotePlayerContainerTemp);
                 }

                 if(tmp_user.hasAudio){
                     await rtc.client.subscribe(tmp_user, "audio");
                     tmp_user.audioTrack.play();
                 }
            }
        }

        document.getElementById("join").onclick = async function () {
            const uid = $(this).data('uid'),
                data_type = $(this).data('type');

            await registerUserToLive();

            if(!localStorage.getItem("is_registered")){
                return ;
            }

            if (data_type == "host") {
                await joinLive("host", uid);
            } else {
                await joinLive("audience", uid);
            }

            $("#join").addClass('d-none');
            $("#leave").removeClass('d-none');

        };

        async function joinLive(role, uid){
            rtc.client = AgoraRTC.createClient({mode: "rtc",codec: "vp8"});

            // register user in db and join live on Agora

            await rtc.client.join(options.appId, options.channel, options.token, uid);

            // Enable dual-stream mode.
            rtc.client.enableDualStream();

            // first show the others
            await publishRemoteUsers(rtc);

            // Create an audio track from the audio sampled by a microphone.
            rtc.localAudioTrack = await AgoraRTC.createMicrophoneAudioTrack();
            // Create a video track from the video captured by a camera.
            rtc.localVideoTrack = await AgoraRTC.createCameraVideoTrack();

            // screen-sharing ...
            // rtc.screenTrack = await AgoraRTC.createScreenVideoTrack();

            // Publish the local audio and video tracks to the channel.
            await rtc.client.publish([rtc.localAudioTrack, rtc.localVideoTrack]);

            // Dynamically create a container in the form of a DIV element for playing the remote video track.
            const localPlayerContainer = document.createElement("div");

            // Specify the ID of the DIV container. You can use the `uid` of the remote user.
            localPlayerContainer.id = options.uid;
            localPlayerContainer.style.width = "240px";
            localPlayerContainer.style.height = "240px";
            localPlayerContainer.classList.add('m-2');
            document.getElementById("users_live").append(localPlayerContainer);

            rtc.localVideoTrack.play(localPlayerContainer);

            await userPublished();

            await userUnpublished();
        }

        document.getElementById("leave").onclick = async function () {
            rtc.client = AgoraRTC.createClient({mode: "rtc",codec: "vp8"});

            // Close all the local tracks.
            rtc.localAudioTrack.close();
            rtc.localVideoTrack.close();
            // Traverse all remote users.
            rtc.client.remoteUsers.forEach(user => {
                // Destroy the dynamically created DIV containers.
                const playerContainer = document.getElementById(user.uid);
                playerContainer && playerContainer.remove();
            });

            // Leave the channel.
            await rtc.client.leave();

            disconectUserFromLive();
            // savoir que c'est l'admin et supprimé le live

            window.location = $('#prev').html();
        };

        async function registerUserToLive(){
            let current_url = window.location.href;

            current_url = current_url.split("/");

            let live_id = current_url.at('-1');

            $.ajax({
                url: "/beta-test/"+live_id,
                success: function (response) {
                    localStorage.clear();

                    if (response.status != 200) {
                        // throw new Error("User already registered");
                        localStorage.setItem('is_registered', true)
                    }else{
                        localStorage.setItem('is_registered', false)
                    }

                    new Promise(r => setTimeout(r, 2000));
                }
            });
        }

        async function disconectUserFromLive(){
            let current_url = window.location.href;
            current_url = current_url.split("/");

            let live_id = current_url.at('-1');

            $.ajax({
                url: "/beta-test-disconnect/"+live_id,
                success: async function(result){
                }
            });
        }

        // async function yourFunction(){
        //     setTimeout(yourFunction, 2000);
        //     console.log('hey')
        //     await publishRemoteUsers(rtc);
        // }
        //
        // yourFunction();
    };
}

startBasicLiveStreaming();
