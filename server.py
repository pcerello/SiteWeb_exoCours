import socket
import socketserver
import datetime


class WebServer(socketserver.BaseRequestHandler):
    def handle(self):
        client = self.request
        io = client.makefile()

        # Receiving client commands line per line
        print('> Request: ')
        receivingHeaders = True
        first = True
        page = '/'
        while receivingHeaders:
            line = io.readline().strip()
            if first:
                first = False
                print('>>> '+line)
                parts = line.split(' ')
                page = parts[1]
            else:
                print(line)
            if line == '':
                receivingHeaders = False

        # Creating a response for the client
        print('> Response: ')
        response = "HTTP/1.1 200 OK\r\n"
        response += "Content-type: text/html\r\n"
        response += "\r\n"

        response += '<a href="/">Accueil</a> '
        response += '<a href="/test">Test</a> '
        response += '<a href="/get">Formulaire</a> '
        response += '<hr/>'

        if page == '/':
            response += datetime.datetime.now().strftime('%H:%M:%S')
        elif page == '/test':
            response += 'Test'
        elif page == '/get':
            response += '<form method="get">'
            response += '   Nombre 1: <input type="text" name="n1" /><br />'
            response += '   Nombre 2: <input type="text" name="n2" /><br />'
            response += '   <input type="submit" value="Additioner!" />'
            response += '</form>'

        print(response)
        client.sendall(response.encode('utf-8'))


HOST, PORT = "127.0.0.1", 8080
socketserver.TCPServer.allow_reuse_address = True
with socketserver.TCPServer((HOST, PORT), WebServer) as server:
    server.serve_forever()
