function ws_recv() {
	var ret = {data:[]};
        var len = ws.rQlen();
        if (len<4) {
		return {err: "Received only: "+len+" bytes!!"};
                ws.close();
                return;
        }
        
        for (var i=0;i<len;i+=4) {
                var ab = new ArrayBuffer(4);
                var ia = new Uint8Array(ab);
                ia[0] = ws.rQshift8();
                ia[1] = ws.rQshift8();
                ia[2] = ws.rQshift8();
                ia[3] = ws.rQshift8();
                var dv = new DataView(ab);
                var d = dv.getUint8(0);
                var t = dv.getUint8(1);
                var v = dv.getInt16(2);
                if (d==1) {
                        ws.close();
                        return {msg:"Disconnect request"};
                }

		ret.data.push({'t':t,'v':v});	
        }
	return ret;
}

function ws_send(t,v) {
/*
        var ab = new ArrayBuffer(3);
        var dv = new DataView(ab);
        dv.setUint8(0,t);
        dv.setInt16(1,v);
        var arr = new Uint8Array(ab);
        ws.send(ab.buffer);
*/
	ws.send([0,t,(v & 0xFF00) >> 8, v & 0x00FF]);
}

                                   
function ws_init() {                                      
        ws.send([0]);
} 

