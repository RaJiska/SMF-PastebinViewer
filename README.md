# Branch build-docker
This branch is meant for testing using a throwaway setup via Docker.

Username: smf  
Password: smf1  

# Build
`cd docker`  
`docker build --rm -t smf_forum .`  
`docker run -itd --name "smf" -p 8080:80 smf_forum`  
