import { Flame, House, InfoIcon, MapIcon, Share } from "lucide-react"
import { Button } from "~/components/ui/button"
import { Calendar } from "~/components/ui/calendar"
import { Input } from "~/components/ui/input"
export const Place = () => {
  return (
    <div className="mt-10">
      <div className="flex justify-between">
        <h2 className="text-2xl font-semibold mb-4">Studio RM - Frente ao mar!</h2>
        <div className="flex items-center gap-2">
          <Share size={16}/>
          <u className="relative top-[2px]">Compartilhar</u>
        </div>
      </div>
      <div className="grid grid-cols-4 gap-3 h-[38rem]">
        <img src="https://a0.muscache.com/im/pictures/abcee8b6-f5c0-4628-8de9-6a6103737312.jpg?im_w=1200&im_format=avif" className="object-cover h-full col-span-2 row-span-2 rounded-l-xl" />
        <img src="https://a0.muscache.com/im/pictures/abcee8b6-f5c0-4628-8de9-6a6103737312.jpg?im_w=1200&im_format=avif" className="object-cover h-full" />
        <img src="https://a0.muscache.com/im/pictures/abcee8b6-f5c0-4628-8de9-6a6103737312.jpg?im_w=1200&im_format=avif" className="object-cover h-full rounded-tr-xl" />
        <img src="https://a0.muscache.com/im/pictures/abcee8b6-f5c0-4628-8de9-6a6103737312.jpg?im_w=1200&im_format=avif" className="object-cover h-full" />
        <img src="https://a0.muscache.com/im/pictures/abcee8b6-f5c0-4628-8de9-6a6103737312.jpg?im_w=1200&im_format=avif" className="object-cover h-full rounded-br-xl" />
      </div>

      <div className="mt-6 flex gap-6">
        <div>
          <div>
            <p className="text-lg font-semibold flex items-center gap-2">
              <InfoIcon/>
              Sobre este lugar
            </p>
            <p className="mt-2">Apartamento inteiro em São Francisco do Sul com 1 quarto, 1 banheiro, 1 cama de casal e 1 sofá-cama.</p>
          </div>

          <div className="mt-4 pb-4 flex gap-3 items-center border-b">
            <img src="https://i.pravatar.cc/150?img=5" className="size-14 rounded-2xl"/>
            <div className="flex flex-col">
              <h3 className="text-lg">Balansa Sarrola</h3>
              <p className="text-sm text-zinc-500">5 anos hospedando</p>
            </div>
          </div>


          <div className="mt-4 pb-4 border-b">
            <h3 className="text-lg font-semibold flex items-center gap-3"><House/> Descrição do lugar</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum voluptate doloremque aliquid nisi, quasi, recusandae harum alias illo quod qui culpa odit suscipit molestias sed at? Ad aspernatur impedit animi!</p>
            <u>Ler descrição completa</u>
          </div>

          <div className="mt-4">
            <h3 className="text-lg font-semibold flex items-center gap-3 mb-4"><MapIcon/>Onde você estará?</h3>
            <iframe className="w-full rounded-xl" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14946.38944877363!2d-54.6424034!3d-20.52272555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1737745925103!5m2!1spt-BR!2sbr" width="600" height="450" style={{ border: 0 }} allowFullScreen loading="lazy" referrerPolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>

        <div className="w-[45rem] self-start p-4 bg-white drop-shadow-lg rounded-xl flex flex-col items-start gap-4 sticky top-0">
          <h3 className="text-lg font-semibold">Reserve agora</h3>
          <p className="flex items-center gap-2"><Flame/> Datas disponíveis</p>
          <Calendar
            mode="range"
            className="w-full flex"
            classNames={{
              months:
                "flex w-full flex-col sm:flex-row space-y-4 sm:space-x-4 sm:space-y-0 flex-1",
              month: "space-y-4 w-full flex flex-col",
              table: "w-full h-full border-collapse space-y-1",
              head_row: "",
              row: "w-full mt-2",
            }}
          />
          <Input placeholder="Quantidade de hospedes"/>
          <Button className="w-full">
            Reservar
          </Button>
        </div>
      </div>

    </div>
  )
}
