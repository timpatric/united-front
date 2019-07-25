/*
NOTE that for every read on the server side, there must be a corresponding write on the client side.
And for every write on the server side, there must be a corresponding read on the client side

In most programs the skeleton of the code will always remain the same.
i.e from 

#include <stdio.h>
	.
	.
	.
	to
	.
	.
	
	if(connect(sockfd, (struct sockaddr *) &serv_addr, sizeof(serv_addr)) < 0){
			error("Connection failed!");
		}

	.
	.
	.
	following here is the code that will suit the program you'll be developing

*/


#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>    // for writing our files as read, write and close
#include <sys/types.h>
#include <sys/socket.h>
#include <netinet/in.h>
#include <netdb.h>      // defines the hostent structure

void error(const char *msg){
	perror(msg);
	exit(1);
}

int main(int argc, char *argv[]){
	int sockfd, portno, newsockfd, n;
	char buffer[512];
    socklen_t clilen;

	struct sockaddr_in serv_addr, cli_addr;
	struct hostent *server;      // hostent structure stores info about a given host e.g hostname and IPV4 address


	if(argc < 2){  // if user has not provided the hostname (ip address) or port no
		fprintf(stderr, "Error no port number provided");
		exit(1);
	}

	sockfd = socket(AF_INET, SOCK_STREAM, 0);
	if(sockfd < 0){
		error("Error opening socket");
	}

	bzero((char *) &serv_addr, sizeof(serv_addr));
	portno = atoi(argv[1]);
	serv_addr.sin_family = AF_INET;
    serv_addr.sin_addr.s_addr = INADDR_ANY;
	serv_addr.sin_port = htons(portno);


    if (bind(sockfd, (struct sockaddr *) &serv_addr, sizeof(serv_addr)) < 0){
    	error("ERROR on binding");
    }

    listen(sockfd,5);
    clilen = sizeof(cli_addr);

	newsockfd = accept(sockfd, (struct sockaddr *) &cli_addr, &clilen);

	if(newsockfd < 0){
		error("Error on accepting the Connection");
	}

	FILE *fp;

	int ch = 0;
	fp = fopen("latestMemberList.txt", "a");

	int words;

	read(newsockfd, &words, sizeof(int));

	while(ch != words){
		read(newsockfd, buffer, 512);
		fprintf(fp, "%s", buffer);
		ch++;
	}

	printf("\nThe file has been received successfully as latestMemberList.txt\n\n");


    close(newsockfd);  
    close(sockfd);  

	return 0;
}