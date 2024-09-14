<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class CartController extends Controller
{
    public function cartList()
    {
        $itens = CartFacade::getContent();
        return view('site.cart', compact('itens'));
    }
    //'finalizar compra' to englesh is 'finish purchase'
    public function finishPurchase()
    {
        $itens = CartFacade::getContent();
        $message = "Olá, gostaria de finalizar a compra dos seguintes itens: ";
    
        foreach ($itens as $item) {
            $message .= "Produto: " . $item->name . " - Quantidade: " . $item->quantity . " - Valor: R$ " . number_format($item->price, 2, ',', '.') . "\n";
        }
    
        // Redirecionar para o WhatsApp com a mensagem completa
        return redirect()->away('https://api.whatsapp.com/send?phone=629386-6925&text=' . urlencode($message));
    }
    
    public function generateQRCode()
    {
        $itens = CartFacade::getContent();
        $message = "Olá, gostaria de finalizar a compra dos seguintes itens: \n";
        
        foreach ($itens as $item) {
            $message .= "Produto: " . $item->name . " - Quantidade: " . $item->quantity . " - Valor: R$ " . number_format($item->price * $item->quantity, 2, ',', '.') . "\n";
        }
    
        $qrCode = QrCode::size(200)->generate('https://api.whatsapp.com/send?phone=629386-6925&text=' . urlencode($message));
    
        return view('seu_modal_view', compact('itens', 'qrCode', 'message'));
    }

    public function cartAdd(Request $request)
    {
        CartFacade::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => abs($request->qtd),
            'attributes' => [
                'image' => $request->img,
            ]  
        ]);
        return redirect()->route('site.cart')->with('success', 'Produto adicionado ao carrinho');
    }
    public function removeCart(Request $request){
        CartFacade::remove($request->id);
        return redirect()->route('site.cart')->with('success', 'Produto removido do carrinho');
    }
    public function updateCart(Request $request){
        CartFacade::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' =>abs($request->quantity) 
            ]
        ]);
        return redirect()->route('site.cart')->with('success', 'Produto atualizado no carrinho');
    }
    public function cleanCart(){
        CartFacade::clear();
        return redirect()->route('site.cart')->with('aviso', 'Seu carrinho esta limpo');
    }
}
