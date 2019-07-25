#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>
#include <sys/types.h>
#include <sys/socket.h>
#include <netinet/in.h>
#include <netdb.h> 
#include <ctype.h>       // will enable the isspace() below to work

void error(const char *msg){
  perror(msg);
  exit(0);
}

// argc is total number of parameters we are passing i.e two => 1=file_name and 2=port_number
int main(int argc, char *argv[]){
  int sockfd, portno, n;
  struct sockaddr_in serv_addr;
  struct hostent *server;

  char buffer[512];    
  if(argc < 3){
    // fprintf(stderr ,"Port number not provided. Program terminated!\n");
    fprintf(stderr,"usage %s hostname port\n", argv[0]);
    exit(0);
  }

  // BELOW, argv[] contains the original commandline arguments. 
  // argv[0] contains filename while argv[1] contains portno.
  portno = atoi(argv[2]);  // atoi converts a string into an integer

  sockfd = socket(AF_INET, SOCK_STREAM, 0);

  if (sockfd < 0) 
      error("ERROR opening socket");
  server = gethostbyname(argv[1]);

  if (server == NULL) {
      fprintf(stderr,"ERROR, no such host\n");
      exit(0);
  }

  // bzero below clears any text or data it is referenced to
  bzero((char *) &serv_addr, sizeof(serv_addr));

  serv_addr.sin_family = AF_INET;
  bcopy((char *)server->h_addr, (char *)&serv_addr.sin_addr.s_addr, server->h_length);
  
  // BELOW, htons = host to network short  ALSO htonl = host to network long
  serv_addr.sin_port = htons(portno); 
  
  if (connect(sockfd,(struct sockaddr *) &serv_addr,sizeof(serv_addr)) < 0){
    error("ERROR connecting");
  }

  bzero(buffer,512);

  FILE *f;
  int words = 0;
  char c;

  f = fopen("memberDetails.txt", "r"); // file pointer will go at start of memberDetails.txt

  // next we are calculating the words in foo.txt
  while((c = getc(f)) != EOF){  // getc is getting the character pointed to by the file pointer
    fscanf(f, "%s", buffer);

    if(isspace(c) || c=='\t'){
      words++;
    }
  }

    // below, we are writing the word count from the above loop to the server
  write(sockfd, &words, sizeof(int));
  rewind(f);

  // NEXT, WE ARE WRITING TO THE SERVER WORD BY WORD THE CONTENTS OF memberDetails.txt
  char ch;
  while(ch != EOF){
    fscanf(f, "%s", buffer);
    write(sockfd, buffer, 512);
    ch = fgetc(f);
  }

  printf("\n\nFile upload success to server\n\n");

  close(sockfd);

  return 0;

}

